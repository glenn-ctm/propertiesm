<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Property;

class TenantUniqueUnitNumber implements Rule
{
    private $property;

    private $error_message = 'Sorry, the unit number is already taken.';
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($property)
    {
        $this->property = $property instanceof Property ? $property : null;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        
        if( is_null($this->property) ) {
            return false;
        } else {
            if( $this->property->tenants()->count() > $this->property->number_of_units ) {
                $this->error_message = 'Property reached the maximum tenants.';
                return false;
            }
            return !$this->property->tenants()->where('unit_number', $value)->exists();
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->error_message;
    }
}
