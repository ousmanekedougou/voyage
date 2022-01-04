<?php

namespace App\Notifications;

use App\Models\Admin\Siege;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactSiegeEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($siege_email,$name,$email,$sub,$sms)
    {
        $this->siege_email = $siege_email;
        $this->name = $name;
        $this->email = $email;
        $this->sub = $sub;
        $this->sms = $sms;
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
         return (new MailMessage)->view('user.notification.clientEmail',[
            'name' => $this->name,
            'email' => $this->email,
            'sub' => $this->sub,
            'sms' => $this->sms,
           ]);
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
