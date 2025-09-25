import { FluentStripeElements } from './utils/fluent-stripe-elements';
import _, { merge } from 'lodash';

(() => {
  if (typeof Spruce === 'undefined') {
    return console.warn('Spruce must be loaded');
  }

  if (typeof Stripe === 'undefined') {
    return console.warn('Stripe must be loaded');
  }

  // Get the pk
  const meta = document.head.querySelector('meta[name="stripe-pk"]');
  if (meta === null) {
    console.warn(
      'Missing stripe key, please define a meta with name "stripe-pk"'
    );
    return;
  }

  const stripe = new Stripe(meta.content);
  const element = new FluentStripeElements(stripe);

  window.createPaymentState = $livewire => {
    const formState = Spruce.store('form', {
      elements: makeElementsState(),
      loading: false,
      error: null,
      submit: submit
    });
    const nodes = {
      cardNumber: 'payment-card-number',
      cardCvc: 'payment-card-cvc',
      cardExpiry: 'payment-card-expiry'
    };
    const style = {
      base: {
        iconColor: '#c4f0ff',
        color: '#4b5563',
        fontWeight: '400',
        fontFamily: 'Popins, Roboto, Open Sans, Segoe UI, sans-serif',
        fontSize: '16px',
        fontSmoothing: 'antialiased',
        ':-webkit-autofill': {
          color: '#4b5563'
        },
        '::placeholder': {
          color: '#9fa6b2'
        }
      }
    };
    const cards = _.keys(nodes);

    function init() {
      Spruce.watch('form.loading', loading => {
        // Toggle disabled state of card inputs
        cards.forEach(key =>
          element.getElement(key).update({ disabled: loading })
        );

        // Clear errors
        if (loading) {
          Spruce.reset('paymentFormErrors', makeFieldState());
        }
      });

      cards.map(key => {
        const cardState = formState.elements.cards[key];
        const card = element.createCard(nodes[key], key, { style: style });

        card.on('change', e => {
          cardState.empty = e.empty;
          cardState.complete = e.complete;
          cardState.pristine = false;
          cardState.error = e.error;
        });

        // Sync disabled state to elements
        Spruce.watch(`form.elements.cards.${key}.disabled`, disabled =>
          card.update({ disabled })
        );
      });

      // Disable card elements when there's already a payment method
      if ($livewire.form.payment_method) {
        formState.elements.disableAll();
      }

      Spruce.store('paymentFormErrors', makeFormFields());

      Livewire.hook('message.received', populatePaymentFormErrors);

      window.addEventListener('payment-error', (e) => showAlert(_.get(e, 'detail.message')));
    }

    async function submit(formData, clientSecret) {
      formState.loading = true;
      formState.error = null;

      try {
        const shouldConfirmCard = !$livewire.form.payment_method;
        if (shouldConfirmCard) {
          if (!formData.payment_method && !this.elements.isValid()) {
            formState.loading = false;

            return showAlert('Please fill out the "CARD INFORMATION" fields');
          }

          const { setupIntent, error } = await element.confirmCardSetup(
            clientSecret,
            {
              payment_method: formData.payment_method ?? {}
            }
          );

          const paymentMethod =
            setupIntent?.payment_method || error?.setup_intent?.payment_method;

          if (error) {
            // This happens because the user has submitted the form with valid card info
            // but the server responded with validation errors. In this case we should
            // regenerate client secret and try submitting again.
            if (_.get(error, 'setup_intent.status') === 'succeeded') {
              await $livewire.changePaymentMethod();

              return submit(formData, clientSecret);
            } else {
              throw error;
            }
          }

          formData.payment_method = paymentMethod;
        }

        $livewire.set('form', formData, true);
        await $livewire.saveForm();
      } catch (e) {
        let error = 'An error has occured. Please try again later.';
        const name = e?.name;

        if (name === 'IntegrationError') {
          error = 'There was a problem generating the client secret.';
        }

        if (_.get(e, 'type') === 'card_error') {
          error = e.message;
        }

        showAlert(error);
      } finally {
        formState.loading = false;
      }
    }

    function showAlert(message) {
      // TODO: Improve alert presentation
      window.alert(message);
    }

    function populatePaymentFormErrors(message) {
      const errors = _.get(message, 'response.serverMemo.errors');

      _.keys(errors)
        .filter(k => _.startsWith(k, 'form.'))
        .forEach(key => Spruce.set(
          _.replace(key, 'form.', 'paymentFormErrors.'),
          _.head(errors[key])
        ))
    }

    function makeElementsState() {
      return {
        cards: {
          cardNumber: makeCardState(),
          cardCvc: makeCardState(),
          cardExpiry: makeCardState()
        },
        getError: function (e) {
          const card = this.cards[e];
          return card && card.error && card.error.message;
        },
        isValid() {
          const self = this;
          return cards.reduce((accum, curr) => {
            const card = self.cards[curr];
            return accum && card.complete && !card.pristine;
          }, true);
        },
        disableAll() {
          cards.forEach(card => (this.cards[card].disabled = true));
        },
        enableAll() {
          cards.forEach(card => (this.cards[card].disabled = false));
        }
      };
    }

    function makeFormFields() {
      return {
        repair_description: null,
        amount: null,
        name_on_card: null,
        payment_method: null
      };
    }

    function makeFieldState(extra) {
      return {
        empty: false,
        error: null,
        pristine: true,
        disabled: false,
        ...extra
      };
    }

    function makeCardState() {
      return makeFieldState({
        complete: false
      });
    }

    init();
  };
})();
