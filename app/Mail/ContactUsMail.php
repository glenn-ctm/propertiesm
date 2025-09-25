<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@propertiesm.com', 'PROPERTIES/M')
                    ->subject('PROPERTIES/M Property Management Company, LLC')
                    ->markdown('emails.contact-us')
                    ->with([
                        'fname' => $this->data['fname'],
                        'lname' => $this->data['lname'],
                        'email' => $this->data['email'],
                        'phone' => $this->data['phone'],
                        'message' => $this->data['message'],
                    ]);;

    }
}
