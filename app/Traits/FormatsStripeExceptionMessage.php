<?php

namespace App\Traits;

use Stripe\ErrorObject;
use Stripe\Exception\{ApiErrorException, CardException, RateLimitException};

trait FormatsStripeExceptionMessage
{
    public function formatStripeException(ApiErrorException $exception)
    {
        if ($exception instanceof CardException) {
            logger()->debug(CardException::class, [
                'decline' => $exception->getDeclineCode(),
            ]);
            $message      = rtrim(trim($exception->getMessage()), '.') . '.';
            $decline_code = $exception->getStripeCode();

            return collect([$message, $this->getDetailedInformation($decline_code)])->filter()->join(' ');
        }

        if ($exception instanceof RateLimitException) {
            return 'Request exhausted. Please try again later.';
        }

        logger()->info('Unknown stripe error', [
            'code'    => $exception->getCode(),
            'message' => $exception->getMessage(),
            'status'  => $exception->getHttpStatus(),
            'class'   => $exception::class,
        ]);

        return match ($exception->getStripeCode()) {
            default => $exception->getMessage(),
        };
    }

    public function getDetailedInformation(string $decline_code)
    {
        /**
         * Decline codes that we need to be silent about:
         *
         * merchant_blacklist
         * fraudulent
         */
        return match ($decline_code) {
            'currency_not_supported'          => 'Contact your card issuer if the currency is supported.',
            'invalid_account'                 => 'Contact your card issuer to check that your card is working.',
            'invalid_amount'                  => 'Contact your card issuer if the amount you specified exceeds the purchase limit',

            'do_not_honor',
            'do_not_try_again',
            'card_not_supported',
            'card_velocity_exceeded',
            'new_account_information_available',
            'no_action_taken',
            'not_permitted',
            'pickup_card',
            'restricted_card',
            'revocation_of_all_authorizations',
            'revocation_of_authorization',
            'security_violation',
            'service_not_allowed',
            'stop_payment_order',
            'transaction_not_allowed',
            'call_issuer'                     => 'Contact your card issuer for more information.',

            'approve_with_id',
            'reenter_transaction',
            'issuer_not_available'            => 'Please try again, and if the error still persists, contact your card issuer.',

            'withdrawal_count_limit_exceeded' => 'Please use another card.',

            default                           => null
        };
    }
}
