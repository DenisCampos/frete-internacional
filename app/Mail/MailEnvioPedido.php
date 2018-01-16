<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Pedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailEnvioPedido extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $pedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Pedido $pedido)
    {
        $this->user = $user;
        $this->pedido = $pedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->replyTo($this->user->email, $this->user->name);
        $this->subject('LCD Sistema: Pedido '.$this->pedido->id.' Enviado');
        return $this->view('mails.pedidoenvio');
    }
}
 