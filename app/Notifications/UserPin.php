<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class UserPin extends Notification
{
    use Queueable;

    public $btn_redirect;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($redirect = null)
    {
        $this->btn_redirect = $redirect;
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
        switch ($notifiable->type()) {
            case 'PO':
                $type = "property owner";
                break;

            case 'TN':
                $type = "tenant";
                break;

            default:
                $type = "one time user";
                break;
        }

        $strings = [
            "We're so glad that you registered as a $type to our website.",
            "Here is your PIN number: <strong>$notifiable->pin</strong>",
            "Make sure that you don't share this publicly, because this is uniquely for you."
        ];

        //   Make sure that you don't share this publicly, because this is uniquely for you.
        return (new MailMessage)
                    ->subject('Welcome to ' . config('app.name'))
                    ->greeting('Hello ' . explode(" ", $notifiable->name)[0] . '!')
                    ->line(new HtmlString(implode("<br>", $strings)))
                    ->line('To proceed to the next step, please click on the link below.')
                    ->action('Proceed', $this->btn_redirect)
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
