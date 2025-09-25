const stripe = Stripe('pk_test_6vQa3OVNqnbMa0DfgwmdsZUb');

const elements = stripe.elements({
  fonts: [
    {
      cssSrc: 'https://fonts.googleapis.com/css?family=Quicksand',
    },
  ],
  locale: 'auto',
});

var elementStyles = {
  base: {
    color: '#374151',
    fontFamily: 'Poppins, sans-serif', 
    fontSize: '16px',
    fontSmoothing: 'antialiased',

    ':focus': {
      color: '#374151',
    },

    '::placeholder': {
      color: '#9faabe',
    },
  },
  invalid: {
    color: '#fff',
    ':focus': {
      color: '#FA755A',
    },
    '::placeholder': {
      color: '#FFCCA5',
    },
  },
};

var elementClasses = {
  focus: 'focus',
  empty: 'empty',
  invalid: 'invalid',
};

var cardNumber = elements.create('cardNumber', {
  style: elementStyles,
  classes: elementClasses,
});
cardNumber.mount('#stripe-payment-card-number');

var cardExpiry = elements.create('cardExpiry', {
  style: elementStyles,
  classes: elementClasses,
});
cardExpiry.mount('#stripe-payment-card-expiry');

var cardCvc = elements.create('cardCvc', {
  style: elementStyles,
  classes: elementClasses,
});
cardCvc.mount('#stripe-payment-card-cvc');

registerElements([cardNumber, cardExpiry, cardCvc], 'stripe-payment');



function registerElements(elements, elementName) {
  var formClass = '.' + elementName;
  var element = document.querySelector(formClass);

  var form = element.querySelector('form');
  var resetButton = element.querySelector('a.reset');
  var error = form.querySelector('.error');
  var errorMessage = error.querySelector('.message');

  function enableInputs() {
    Array.prototype.forEach.call(
      form.querySelectorAll(
        "input[type='text'], input[type='email'], input[type='tel']"
      ),
      function(input) {
        input.removeAttribute('disabled');
      }
    );
  }

  function disableInputs() {
    Array.prototype.forEach.call(
      form.querySelectorAll(
        "input[type='text'], input[type='email'], input[type='tel']"
      ),
      function(input) {
        input.setAttribute('disabled', 'true');
      }
    );
  }

  function triggerBrowserValidation() {
    // The only way to trigger HTML5 form validation UI is to fake a user submit
    // event.
    var submit = document.createElement('input');
    submit.type = 'submit';
    submit.style.display = 'none';
    form.appendChild(submit);
    submit.click();
    submit.remove();
  }

  // Listen for errors from each Element, and show error messages in the UI.
  var savedErrors = {};
  elements.forEach(function(element, idx) {
    element.on('change', function(event) {
      if (event.error) {
        error.classList.add('visible');
        savedErrors[idx] = event.error.message;
        errorMessage.innerText = event.error.message;
      } else {
        savedErrors[idx] = null;

        // Loop over the saved errors and find the first one, if any.
        var nextError = Object.keys(savedErrors)
          .sort()
          .reduce(function(maybeFoundError, key) {
            return maybeFoundError || savedErrors[key];
          }, null);

        if (nextError) {
          // Now that they've fixed the current error, show another one.
          errorMessage.innerText = nextError;
        } else {
          // The user fixed the last error; no more errors.
          error.classList.remove('visible');
        }
      }
    });
  });

  // Listen on the form's 'submit' handler...
  form.addEventListener('submit', function(e) {
    e.preventDefault();

    // Trigger HTML5 validation UI on the form if any of the inputs fail
    // validation.
    var plainInputsValid = true;
    Array.prototype.forEach.call(form.querySelectorAll('input'), function(
      input
    ) {
      if (input.checkValidity && !input.checkValidity()) {
        plainInputsValid = false;
        return;
      }
    });
    if (!plainInputsValid) {
      triggerBrowserValidation();
      return;
    }

    // Show a loading screen...
    element.classList.add('submitting');

    // Disable all inputs.
    disableInputs();

    // Gather additional customer data we may have collected in our form.
    var name = form.querySelector('#' + elementName + '-name');
    var address1 = form.querySelector('#' + elementName + '-address');
    var city = form.querySelector('#' + elementName + '-city');
    var state = form.querySelector('#' + elementName + '-state');
    var zip = form.querySelector('#' + elementName + '-zip');
    var additionalData = {
      name: name ? name.value : undefined,
      address_line1: address1 ? address1.value : undefined,
      address_city: city ? city.value : undefined,
      address_state: state ? state.value : undefined,
      address_zip: zip ? zip.value : undefined,
    };

    // Use Stripe.js to create a token. We only need to pass in one Element
    // from the Element group in order to create a token. We can also pass
    // in the additional customer data we collected in our form.
    stripe.createToken(elements[0], additionalData).then(function(result) {
      // Stop loading!
      element.classList.remove('submitting');

      if (result.token) {
        // If we received a token, show the token ID.
        element.querySelector('.token').innerText = result.token.id;
        element.classList.add('submitted');
      } else {
        // Otherwise, un-disable inputs.
        enableInputs();
      }
    });
  });

  resetButton.addEventListener('click', function(e) {
    e.preventDefault();
    // Resetting the form (instead of setting the value to `''` for each input)
    // helps us clear webkit autofill styles.
    form.reset();

    // Clear each Element.
    elements.forEach(function(element) {
      element.clear();
    });

    // Reset error state as well.
    error.classList.remove('visible');

    // Resetting the form does not un-disable inputs, so we need to do it separately:
    enableInputs();
    element.classList.remove('submitted');
  });
}


// const cardElement = elements.create('card');
// cardElement.mount('#stripe-card-element');