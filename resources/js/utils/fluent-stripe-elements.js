import _ from 'lodash';

export class FluentStripeElements {
  constructor(stripe, opts) {
    this.__elements = stripe.elements(opts);
    this.stripe = stripe
  }

  createCard(target, cardType, opts) {
    const card = this.__elements.create(cardType, opts);

    this.mount(target, card);

    return card;
  }

  mount(target, card) {
    const id = typeof target === HTMLElement ? target.id : target;

    card.mount(`#${id}`);
  }

  createToken(data) {
    return this.stripe.createToken(this.getCardNumber(), data);
  }

  createPaymentMethod(opts) {
    return this.stripe.createPaymentMethod({
      type: 'card',
      card: this.getCardNumber(),
      billing_details: opts?.billing_details || {}
    });
  }

  async confirmCardSetup(clientSecret, opts = {}) {
    const payment_method = _.get(opts, 'payment_method', {});

    if (!_.isString(payment_method)) {
      payment_method.card = this.getCardNumber();
    }

    return this.stripe.confirmCardSetup(clientSecret, {
      ...opts,
      payment_method
    });
  }

  getElement(type) {
    return this.__elements.getElement(type);
  }

  getCardNumber() {
    return this.getElement('cardNumber')
  }
}
