<?php

namespace App\Notifications;

use App\Models\User\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class RegisteredClient extends Notification
{
    use Queueable;
    public $client; 
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Client $client,$type_store)
    {
        $this->client = $client;
        $this->type_store = $type_store;
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
        $image = Storage::url($this->client->agence_logo); 
        return (new MailMessage)->view('user.notification.registeredClient',[
            'client' => $this->client,
            'image' => $image,
            'type_store' => $this->type_store
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
