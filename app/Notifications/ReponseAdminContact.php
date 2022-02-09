<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ReponseAdminContact extends Notification
{
    use Queueable;
    public $name;
    public $msg;
    public $image;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name , $msg , $image)
    {
        $this->name = $name;
        $this->msg = $msg;
        $this->image = $image;
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
        $status = ''; 
        $siege = '';
        $agence = '';
        if (Auth::user()->is_admin == 0 || Auth::user()->is_admin == 1) {
            $status = 1;
        }elseif (Auth::user()->is_admin == 3) {
            $status = 2;
            $siege = Auth::user()->siege->name;
            $agence = Auth::user()->agence_name;
        }
        return (new MailMessage)->view('user.notification.reponseAdmin',
        [
            'name' => $this->name, 
            'msg' => $this->msg, 
            'image' => $this->image, 
            'status' => $status,
            'siege' => $siege,
            'agence' => $agence
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

