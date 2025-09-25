<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class GetAQuote extends Notification
{
    use Queueable;

    public $sender;
    public $remarks;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($sender, $remarks)
    {
        $this->sender = $sender;
        $this->remarks = $remarks;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $sender = $this->sender;
        $strings = [
            "Name: $sender->name",
            "Email: $sender->email",
            "Address: $sender->address",
            "Unit number: $sender->unit_number",
            "City: $sender->city",
            "Zip code: $sender->zip_code",
            "Contact number: $sender->contact_number",
            "Referrence Url: " . url()->previous(),
        ];

        return (new MailMessage)
            ->subject($this->sender->name . ' requesting a quote')
            ->greeting('Hello ' . explode(" ", $notifiable->name)[0] . '!')
            ->line(new HtmlString(implode("<br>", $strings)))
            ->line($this->remarks);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
