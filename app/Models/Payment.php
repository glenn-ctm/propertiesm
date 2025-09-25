<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use App\Exceptions\Payment\AlreadyChargedException;
use BenSampo\Enum\Traits\CastsEnums;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cknow\Money\MoneyCast;
use Exception;
use Laravel\Cashier\PaymentMethod;
use Stripe\ApiRequestor;
use Stripe\Exception\CardException;
use Stripe\PaymentMethod as StripePaymentMethod;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $user_id
 * @property PaymentStatus $status
 * @property string $repair_description
 * @property \Cknow\Money\Money|null $amount
 * @property string $currency
 * @property string $name_on_card
 * @property string|null $payment_method
 * @property string|null $last4
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read bool $is_paid
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereLast4($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNameOnCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereRepairDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUserId($value)
 * @mixin \Eloquent
 */
class Payment extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'repair_description',
        'amount',
        'currency',
        'name_on_card',
        'payment_method',
        'last4',
    ];

    protected $casts = [
        'amount' => MoneyCast::class . ':currency',
        'status' => PaymentStatus::class,
    ];

    protected $attributes = [
        'status' => PaymentStatus::Pending,
    ];

    public function __construct(array $attributes = [])
    {
        $attributes['currency'] = $attributes['currency'] ?? config('app.currency');

        parent::__construct($attributes);
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function (self $payment) {
            // Make sure the user ID is set
            if (!isset($payment->user_id)) {
                $payment->user_id = auth()->id();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the isPaid attribute
     */
    public function getIsPaidAttribute(): bool
    {
        return isset($this->payment_method) && $this->status->is(PaymentStatus::Success());
    }

    /**
     * Begin to charge this payment to Stripe
     */
    public function charge()
    {
        throw_if($this->is_paid, new AlreadyChargedException(payment: $this));

        $opts = [
            'currency' => $this->currency
        ];

        $this->user->charge($this->amount->getAmount(), $this->payment_method, $opts);

        $this->status = PaymentStatus::Success;

        $this->save();
    }

    /**
     * Set the payment_method and last4 attributes using the given payment method.
     */
    public function setPaymentMethod(string|PaymentMethod|StripePaymentMethod $paymentMethod = null)
    {
        if (is_string($paymentMethod)) {
            $paymentMethod = (new User)->findPaymentMethod($paymentMethod);
        }

        if ($paymentMethod instanceof PaymentMethod) {
            $paymentMethod = $paymentMethod->asStripePaymentMethod();
        }

        $this->payment_method = $paymentMethod?->id;
        $this->last4          = $paymentMethod?->card?->last4;

        return $this;
    }
}
