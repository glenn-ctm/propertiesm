<?php

namespace App\Http\Livewire\Site\Pages;

use Livewire\Component;
use App\Models\User;
use App\Models\RepairRequest;
use Illuminate\Validation\Rule;
use App\Enums\{RepairRequestStatus, PropertyInspection, PropertyMaintenance, PropertyManagementNeed};

class PropertyOwnerRegister extends Component
{
    public $maintenance,
           $landscaping,
           $management_needs,
           $inspections,
           $frequency_of_inspection,
           $number_of_units,
           $remarks;

    public $user;

    public $maintenanceSelect,
           $inspectionsSelect,
           $mgtNeedsSelect;

    protected $rules = [
        'maintenance' => [
                // 'array',
                //'required',
                // 'min:1',
        ],
        //'landscaping' => 'required',
        'management_needs' => [
                // 'array',
                //'required',
                // 'min:1',
        ],
        'inspections' => [
                // 'array',
                //'required',
                // 'min:1',
        ],
        // 'frequency_of_inspection' => 'required',
        // 'number_of_units' => 'required|numeric',
        // 'remarks' => 'required',
        'frequency_of_inspection' => '',
        'number_of_units' => ['nullable', 'numeric'],
        'remarks' => '',
    ];

    protected $listeners = ['pinValidationSuccess' => 'setUser'];
    
    public function mount() {
        $this->maintenanceSelect = PropertyMaintenance::getValues();
        $this->inspectionsSelect = PropertyInspection::getValues();
        $this->mgtNeedsSelect    = PropertyManagementNeed::getValues();
        $this->setUser();
    }

    public function arrayTransform($value, array $values) {
        if($value){
            $selected = explode(',' , $value);
            return array_filter($selected, function($val) use($values){
                return in_array($val, $values);
            });
        }
        return [];
    }

    public function onSubmit(){
        $this->validate();

        $this->setUser();

        if( !$this->user->repair_requests()->count() ) {
            $this->rules = [
                'maintenance' => [
                        // 'array',
                        'required',
                        // 'min:1',
                ],
                //'landscaping' => 'required',
                'management_needs' => [
                        // 'array',
                        'required',
                        // 'min:1',
                ],
                'inspections' => [
                        // 'array',
                        'required',
                        // 'min:1',
                ],
                'frequency_of_inspection' => 'required',
                'number_of_units' => 'required|numeric',
                'remarks' => 'required',
            ];
        }

        $this->validate();

        if( $this->user->repair_requests()->count() && !$this->user->hasVerifiedEmail() ){
            return $this->alertError('You already submitted a request and your account is not yet verified. Please allow us to verify your account so you can send another request. You will be notified via email if your account is verified.', 15000);
        }

        $repair_request = new RepairRequest([
            'maintenance' => $this->arrayTransform($this->maintenance, $this->maintenanceSelect),
            'landscaping' => 'NA',
            'management_needs' => $this->arrayTransform($this->management_needs, $this->mgtNeedsSelect),
            'inspections' => $this->arrayTransform($this->inspections, $this->inspectionsSelect),
            'frequency_of_inspection' => $this->frequency_of_inspection !== NULL ? $this->frequency_of_inspection : 'NA',
            'number_of_units' => $this->number_of_units !== NULL ? $this->number_of_units : 0,
            'address' => $this->user->address,
            'contact_number' => $this->user->contact_number,
            'opt_out' => false,
            'status' => RepairRequestStatus::PENDING,
            'remarks' => $this->remarks !== NULL ? $this->remarks : '',
        ]);

        $this->user->repair_requests()->save($repair_request);

        $this->alertSuccess('Please allow 24 hours to be contacted for scheduling.', 15000);

        $this->emit('requestSubmitted');

        $this->resetFields();
    }

    protected function resetFields(){
        $this->reset([
            'maintenance',
            'landscaping',
            'management_needs',
            'inspections',
            'frequency_of_inspection',
            'number_of_units',
            'remarks'
        ]);
    }

    public function setUser(){
        if($this->user === null){
            $this->user = auth()->user();
        }
    }

    public function render()
    {
        if (array_key_exists('test', $_GET)) {
            return view('livewire.site.pages.property-owner-register-new')->extends('layouts.site'); 
        }
        return view('livewire.site.pages.property-owner-register-new')->extends('layouts.site'); 
    }
}
