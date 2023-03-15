<?php

namespace App\Notifications;

use App\Models\User\Client;
use App\Models\User\Customer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ClientAbsent extends Notification
{
    use Queueable;
    public $client;
    public $agent;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
        $this->agent = Auth::guard('agent')->user();
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
        return (new MailMessage)->view('client.notification.clientAbsent',[
            'client' => $this->client,
            'agent'=> $this->agent,
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
