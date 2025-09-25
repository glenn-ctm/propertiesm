<?php

namespace App\Http\Livewire\Payment;

use App\Enums\PaymentStep;
use App\Exceptions\Payment\AlreadyChargedException;
use App\Http\Livewire\Payment\Models\Stepper;
use Livewire\Component;
use App\Models\{Payment, User};
use App\Services\PaymentSessionService;
use App\Traits\{ContextualLogger, FormatsStripeExceptionMessage};
use Illuminate\Support\Collection;
use Stripe\Exception\ApiErrorException;

class Container extends Component
{
    use ContextualLogger, FormatsStripeExceptionMessage;

    public Payment $payment;

    public array $form = [
        'repair_description' => null,
        'amount'             => null,
        'name_on_card'       => null,
        'payment_method'     => null,
    ];

    protected Stepper $steps;

    protected $rules = [
        'form.repair_description' => 'required|string',
        'form.amount'             => 'required|numeric|gt:0',
        'form.name_on_card'       => 'required|string',
        'form.payment_method'     => 'string',
    ];

    protected $listeners = [
        'goBack'   => 'previous',
    ];

    protected PaymentSessionService $service;
    protected User $user;
    protected string $clientSecret;

    public function mount()
    {
        $this->logInContext();
        $this->prepareComponent();
        // Start of depending on the current payment state
        $this->determineStepState();

        // If we already have a payment pre-fill the form data
        if ($this->payment->exists) {

            $this->syncModelToForm($this->payment);
        }
    }

    public function hydrate()
    {
        $this->logInContext();
        $this->prepareComponent();
    }

    /**
     * Casts form amount to float
     */
    public function updatedForm()
    {
        $this->logInContext();
        $this->form['amount'] = (float) $this->form['amount'];
    }

    public function render()
    {
        $data = [
            'steps'        => $this->steps,
            'currency'     => $this->payment->currency,
            'clientSecret' => $this->clientSecret,
        ];

        // Step on details by default
        if ($this->steps->getActive() === -1) {

            $this->logInContext(message: "Defaulting to details step");
            $this->stepOnDetails();
        }

        return view('livewire.payment.container', $data)
            ->extends('layouts.site', ['useSpruce' => true])
            ->section('content');
    }

    public function saveForm()
    {
        $this->logInContext(data: [
            'model' => $this->payment->getAttributes(),
            'form'  => $this->form,
        ]);

        // Stay on details when validation fails
        $this->stepOnDetails();

        $this->validate();

        // Prevent updating paid payment
        if ($this->payment->isPaid) {
            $this->logInContext(message: "Cannot save, payment has already been paid", level: "info");
            return;
        }

        $paymentMethod = $this->assignPaymentMethodToUser();

        $this->payment->user_id = $this->user->id;
        $this->payment->setPaymentMethod($paymentMethod);
        $this->payment->fill($this->form);
        $this->payment->save();

        $this->service->setPayment($this->payment);

        $this->determineStepState();
    }

    public function goBack()
    {
        $this->logInContext();

        $this->steps->stepBack();
    }

    public function confirm()
    {
        $this->logInContext();

        if ($this->payment->is_paid) {
            $this->stepOnSuccess();
        }

        $this->charge();
    }

    public function changePaymentMethod()
    {
        $this->logInContext();

        if ($this->payment->exists && $this->payment->is_paid) {

            return $this->dispatchPaymentError('Payment has already been paid.');
        }

        $this->service->regenerateClientSecret();
        $this->clientSecret = $this->service->getClientSecret();

        if ($this->payment->exists) {

            $this->payment->setPaymentMethod(null)->save();
        }

        $this->form['payment_method'] = null;

        $this->logInContext(data: [
            'form'    => $this->form,
            'payment' => $this->payment->toArray(),
        ]);

        $this->stepOnDetails();
    }

    protected function assignPaymentMethodToUser()
    {
        if (!$this->user->hasStripeId()) {

            $this->user->createAsStripeCustomer();
        }

        $paymentMethod = $this->user->addPaymentMethod($this->form['payment_method']);

        return $paymentMethod;
    }

    protected function prepareComponent()
    {
        $this->logInContext();

        $this->service = resolve(PaymentSessionService::class);

        $this->clientSecret = $this->service->getClientSecret();

        $this->initPaymentSession();

        $this->initSteps();
    }

    protected function initPaymentSession()
    {
        $this->logInContext();

        $this->user = auth()->user();

        $payment = $this->service->getPayment();

        $this->payment = !is_null($payment) ? $payment : new Payment();
    }

    protected function initSteps()
    {
        $this->logInContext();

        $this->steps = Stepper::instantiateFromEnum();
    }

    protected function syncModelToForm(Payment $payment)
    {
        array_map(
            fn ($key) => $this->form[$key] = $key === 'amount'
                ? (float)$payment->amount->formatByDecimal()
                : $payment->getAttribute($key),
            array_keys($this->form)
        );
    }

    protected function determineStepState()
    {
        $before = $this->steps->getActiveValue()?->key;

        if ($this->payment->is_paid) {

            $this->stepOnSuccess();
        } else if ($this->payment->exists && !is_null($this->payment->payment_method)) {

            $this->stepOnConfirm();
        } else {

            $this->stepOnDetails();
        }

        $this->logInContext(data: [
            'payment' => $this->payment->toArray(),
            'before' => $before,
            'after' => $this->steps->getActiveValue()?->key
        ]);
    }

    protected function charge()
    {
        $error = collect();

        try {
            $this->payment->charge();
            $this->service->clearSession();
        } catch (ApiErrorException $e) {
            data_set($error, 'message', $this->formatStripeException($e));
        } catch (\Exception $e) {
            data_set($error, 'message', 'Unknown error has occured');
            report($e);
        } catch (AlreadyChargedException) {
        } finally {
            if (!$error->isEmpty()) {

                $this->dispatchPaymentError($error);
                $this->stepOnConfirm();
            } else {

                $this->stepOnSuccess();
            }
        }
    }

    protected function stepOnDetails()
    {
        $this->steps->stepOn(PaymentStep::Details());
    }

    protected function stepOnConfirm()
    {
        $this->steps->stepOn(PaymentStep::Confirm());
    }

    protected function stepOnSuccess()
    {
        $this->steps->stepOn(PaymentStep::Success());
    }

    protected function dispatchPaymentError(string|array|Collection $errorBag)
    {
        if (is_string($errorBag)) {

            $errorBag = ['message' => $errorBag];
        }

        $this->dispatchBrowserEvent('payment-error', $errorBag);
    }
}
