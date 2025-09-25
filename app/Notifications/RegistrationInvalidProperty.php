<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class RegistrationInvalidProperty extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $strings = [
            "We're sorry to inform you that when you register as a tenant, the address was not recognized.",
            "Please try to register again, and if this scenario repeats, that means the address is not listed as one of our clients.",
        ];

        return (new MailMessage)
                    ->greeting('Hello ' . explode(" ", $notifiable->name)[0] . '!')
                    ->line(new HtmlString(implode("<br>", $strings)))
                    ->line("If you have any questions or concerns, please feel free to send us an email at info@toollawn.com.");
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
