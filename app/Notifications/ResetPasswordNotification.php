<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    /**
     * The password reset token.
     *
     * @var string
     */
    public $token;

    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param  mixed  $notifiable
     * @return array|string
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pedido de alteração de senha')
            ->greeting('Olá '. $notifiable->name)
            ->line('Você recebeu este e-mail porque recebemos uma solicitação de alteração de senha na sua conta.')
            ->action('Alterar senha', url(config('app.url').route('password.reset', $this->token, false)))
            ->line('Se você não solicitou a alteração de senha, ignore este e-mail.')
            ->salutation('Saudações, Equipe LCD');
    }
}
