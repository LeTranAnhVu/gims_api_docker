<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetRequest extends Notification
{
    use Queueable;

    protected $token;

    protected $redirectUrl;

    /**
     * Create a new notification instance.
     * @param  string  $token
     * @param  string  $redirectUrl
     */
    public function __construct(string $token, string $redirectUrl)
    {
        $this->token = $token;
        $this->redirectUrl = $redirectUrl;
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
        $redirectUrl = $this->redirectUrl.'?token='.$this->token;
        return (new MailMessage)
            ->subject('Reset Password Notification')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', $redirectUrl)
            ->line('If you did not request a password reset, no further action is required.');
    }
}
