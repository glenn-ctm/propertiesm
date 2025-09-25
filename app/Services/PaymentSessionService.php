<?php

namespace App\Services;

use App\Models\Payment;
use App\Models\User;
use App\Traits\ContextualLogger;
use Illuminate\Session\Store;
use Illuminate\Support\Collection;

class PaymentSessionService
{
    use ContextualLogger;

    protected Collection $data;

    const SESSION_KEY = 'payment_session';

    public function __construct(public Store $session)
    {
        if ($this->session->has(self::SESSION_KEY)) {
            $this->data = collect($this->session->get(self::SESSION_KEY));
        } else {
            $this->data = collect();
        }

        $this->logInContext(data: [
            'data' => $this->data->toArray(),
            'session' => $this->session->all()
        ]);
    }

    public function setPayment(int|Payment $payment)
    {
        $this->logInContext(data: ['payment' => $payment]);
        if ($payment instanceof Payment) {
            $payment = $payment->getKey();
        }

        $this->data->put('payment_id', $payment);
    }

    public function getPayment(): ?Payment
    {
        $this->logInContext(data: $this->data->toArray());
        $id = $this->data->get('payment_id');
        return is_null($id) ? $id :  Payment::find($id);
    }

    /**
     * Get the Setup intent client secret
     */
    public function getClientSecret(): ?string
    {
        $this->ensureSetupIntentClientSecret();
        return $this->data->get('intent');
    }

    /**
     * Regenerates client secret.
     */
    public function regenerateClientSecret()
    {
        $intent = $this->createSetupIntent();

        $this->data->put('intent', $intent->client_secret);
    }

    /**
     * Save the data to session
     */
    public function save()
    {
        $this->session->put(self::SESSION_KEY, $this->data);

        $this->logInContext(data: [
            'data' => $this->data->toArray(),
            'session' => $this->session->all()
        ]);
    }

    /**
     * Clears the session data
     */
    public function clearSession()
    {
        $this->logInContext();

        $this->data = collect();
    }

    /**
     * Ensure that the session has SetupIntent
     */
    protected function ensureSetupIntentClientSecret()
    {
        // Bail early, intent is already provided
        if ($this->data->has('intent')) {
            $this->logInContext(message: "SetupIntent exists, skipping creation...");
            return;
        }

        $intent = $this->createSetupIntent();
        $this->data->put('intent', $intent->client_secret);
    }

    protected function authenticated()
    {
        return auth()->check();
    }

    protected function user(): ?User
    {
        return auth()->user();
    }

    protected function createSetupIntent()
    {
        $opts = ['usage' => 'on_session'];

        return $this->authenticated() ?
            $this->user()->createSetupIntent($opts)
            : (new User)->createSetupIntent($opts);
    }
}
