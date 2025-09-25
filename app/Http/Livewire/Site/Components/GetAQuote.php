<?php

namespace App\Http\Livewire\Site\Components;

use Livewire\Component;
use App\Notifications\GetAQuote as GetAQuoteNotification;
use App\Models\User;
use App\Models\RepairRequest;
use App\Enums\RepairRequestStatus;

class GetAQuote extends Component
{
    public $repairDescription;

    public $pinValidated = false;

    public function descriptionSubmit() {
        if ( $this->pinValidated && $this->repairDescription ) {
            $admin = User::find(1);
            if($admin) {
                $admin->notify(new GetAQuoteNotification(auth()->user(), $this->repairDescription));
            }

            $repair_request = new RepairRequest([
                'maintenance' => 'NA',
                'landscaping' => 'NA',
                'management_needs' => 'NA',
                'inspections' => 'NA',
                'frequency_of_inspection' => 'NA',
                'number_of_units' => 0,
                'address' => auth()->user()->address,
                'contact_number' => auth()->user()->contact_number,
                'opt_out' => false,
                'status' => RepairRequestStatus::PENDING,
                'remarks' => $this->repairDescription,
            ]);
    
            auth()->user()->repair_requests()->save($repair_request);

            $this->alertSuccess('Please allow 24 hours to be contacted for scheduling.', 5000);
            // $this->emit('getAQuoteSubmitted');
            $this->reset(['repairDescription']);
        }
    }

    public function render()
    {
        return view('livewire.site.components.get-a-quote');
    }
}
