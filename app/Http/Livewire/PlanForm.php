<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Http;
use App\Mail\PlanMail;
use Validator;

class PlanForm extends Component
{
    public $fname, $lname, $phone, $email, $plan, $message, $recaptchaResponse, $successMessage;

    protected $rules = [
        'fname' => 'required',
        'lname' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'plan' => 'required|in:premier,advanced,paramount',
        'message' => 'required',
        'recaptchaResponse' => 'required|captcha'
    ];
    
    protected $messages = [
        'fname.required' => 'The first name field is required.',
        'lname.required' => 'The last name field is required.',
        'recaptchaResponse.required' => 'Please verify that you are not a robot.',
        'recaptchaResponse.captcha' => 'reCAPTCHA verification failed. Try again.',
    ];
    
    public function submit()
    {
        $data = $this->validate();

        $this->emit('formSubmitting');

        //Mail::to($this->email)->bcc('info@toollawn.com')->send(new PlanMail(
        Mail::to('info@toollawn.com')->send(new PlanMail(
            array (
                'fname' => $this->fname,
                'lname' => $this->lname,
                'phone' => $this->phone,
                'email' => $this->email,
                'plan' => $this->plan,
                'message' => $this->message
            )
        ));
        
        // Reset form fields and show success message
        $this->resetForm();

        // Emit event to reset reCAPTCHA on the frontend
        $this->emit('formSubmitted');
    }
    
    public function resetForm()
    {
        $this->reset(['fname', 'lname', 'email', 'phone', 'plan', 'message', 'recaptchaResponse']);
        $this->successMessage = 'The plan you requested has been submitted. Page will reload in 5 seconds.';
        $this->emit('clearSuccessMessage');
    }

    public function render()
    {
        return view('livewire.plan-form');
    }
}
