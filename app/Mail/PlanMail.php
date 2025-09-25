<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PlanMail extends Mailable
{
    use Queueable, SerializesModels;

    public $fname, $lname, $phone, $email, $plan, $message;

    private $plans = array(
        'premier' => 'Premier 1 Year',
        'advanced' => 'Advanced 3 Years',
        'paramount' => 'Paramount 5 Years',
    );
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->fname = $data['fname'];
        $this->lname = $data['lname'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->plan = $this->plans[$data['plan']];
        $this->message = $data['message'];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address('admin@propertiesm.com', 'PROPERTIES/M'),
            subject: 'PROPERTIES/M Property Management Company, LLC',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.plan',
            with: [
                'fname' => $this->fname,
                'lname' => $this->lname,
                'phone' => $this->phone,
                'email' => $this->email,
                'plan' => $this->plan,
                'message' => $this->message
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
