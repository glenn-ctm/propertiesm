<?php

namespace App\Http\Livewire\Site\Components;

use Livewire\Component;
use App\Models\User;
use App\Models\Property;
use App\Notifications\UserPin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Enums\UserRole;
use App\Notifications\RegistrationInvalidProperty;
use App\Rules\TenantUniqueUnitNumber;

class Registration extends Component
{
    public $fullName, $address, $unitNumber, $city, $zipCode, $email, $contactNumber;

    private $types = [ "one_time", "tenant", "property_owner" ];
    public $selectedType = 'one_time';

    public $isOneTime = false;

    protected $rules = [
        'fullName' => 'required',
        'email' => 'required|email|unique:users,email',
        'address' => 'required',
        'city' => 'required',
        'zipCode' => 'required',
        'contactNumber' => 'required',
    ];

    public function mount($type = null)
    {
        $this->ensureType($type);
        if ( $type === 'property_owner' ) {
            $this->unitNumber = 'N/A';
        }
    }

    public function submit() {

        $property = $this->findProperty();

        if ( $this->selectedType === 'tenant' && $property ) {
            $this->rules['unitNumber'] = [ 'required', new TenantUniqueUnitNumber($property) ];
        }

        $this->validate();

        if( $this->selectedType === 'tenant' && !$property ) {
            $user = new User($this->userAttributes());
            $user->notify(new RegistrationInvalidProperty());
        } else {
            $user = User::create($this->userAttributes());

            $btn_redirect = route('login');

            switch($this->selectedType) {
                case 'tenant':
                    $user->assignRoleAndPin(UserRole::TENANT);
                    if(url()->previous() === route('property-listing-registration')) {
                        $btn_redirect = route('login', [ 'redirect' => route('site-properties.index') ]);
                    }
                    break;
                case 'one_time':
                    $user->assignRoleAndPin(UserRole::REGULAR);
                    if(url()->previous() === route('property-listing-registration')) {
                        $btn_redirect = route('login', [ 'redirect' => route('site-properties.index') ]);
                    } else {
                        $btn_redirect = url()->previous();
                    }
                    break;
                case 'property_owner':
                    $user->assignRoleAndPin(UserRole::PROPERTY_OWNER);
                    if(url()->previous() === route('property-listing-registration')) {
                        $btn_redirect = route('login', [ 'redirect' => route('site-properties.index') ]);
                    } else {
                        $btn_redirect = url()->previous();
                    }
                    break;
            }

            if($this->selectedType === 'tenant') {
                $property->tenants()->attach($user->id);
            }

            // property owner must verify to admin
            if($this->selectedType !== 'property_owner'){
                $user->markEmailAsVerified();
            }

            $user->notify(new UserPin($btn_redirect));

            $this->fieldReset();

            $this->emit('registrationUserAdded', $user);
        }
        
        $this->emit('pinValidationSuccess');

        $this->alertSuccess('Thank you for your registration! Please check your email for further instructions.', 10000);
    }

    protected function fieldReset() {
        $resetProperties = [
            'fullName',
            'address',
            'city',
            'zipCode',
            'email',
            'contactNumber'
        ];

        if ( $this->selectedType !== 'property_owner' ) {
            $resetProperties[] = 'unitNumber';
        }

        $this->reset($resetProperties);
    }

    protected function ensureType($type){
        if( in_array($type, $this->types) ) {
            $this->selectedType = $type;
        }

        if ( $this->selectedType === 'one_time' ) {
            $this->isOneTime = true;
        }
    }

    protected function findProperty()
    {
        $property  = Property::where('address', $this->address)
                        ->where('city', $this->city)
                        ->where('zip_code', $this->zipCode);

        return $property->first();
    }

    protected function userAttributes()
    {
        return [
            'name' => $this->fullName,
            'email' => $this->email,
            'address' => $this->address,
            'unit_number' => $this->unitNumber,
            'city' => $this->city,
            'zip_code' => $this->zipCode,
            'contact_number' => $this->contactNumber,
            'password' => Hash::make( Str::random(16) ),
            'pin' => Str::random(16)
        ];
    }

    public function render()
    {
        return view('livewire.site.components.registration');
    }
}
