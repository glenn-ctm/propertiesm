<?php

namespace App\Http\Livewire\Site\Components;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class InputPin extends Component
{
    public $pin;
    public $pinValidated = false;

    public function updatingPin($value){

        $validator = Validator::make(
            ['pin' => $value],
            ['pin' => 'required']
        );

        if( $validator->fails() ) {
            return $this->onErrorEmit('The pin field is required.');
        }

        $user = auth()->user();

        if($user === null) {
            $user = User::where('pin', $value)->first();
        }

        if(optional($user)->pin === $value) {
            auth()->login($user);
            $this->pinValidated = true;
            return $this->emit('pinValidationSuccess');
        }

        $this->onErrorEmit('The pin is invalid.');
    }

    protected function onErrorEmit($message = null) {
        $this->emit('pinValidationError', $message);
    }

    public function render()
    {
        return view('livewire.site.components.input-pin');
    }
}
