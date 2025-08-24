<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegistered extends Notification
{
    use Queueable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail', 'database']; // Sends via email & stores in DB
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Welcome to Our App!')
                    ->greeting('Hello ' . $this->user->name)
                    ->line('Thank you for registering with us.')
                    ->action('Visit Website', url('/'))
                    ->line('We’re glad to have you here!');
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'New user registered: ' . $this->user->name,
            'user_id' => $this->user->id
        ];
    }
}
