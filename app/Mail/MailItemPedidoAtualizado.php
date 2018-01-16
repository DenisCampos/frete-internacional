<?php

namespace App\Mail;

use App\Models\ItemPedido;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailItemPedidoAtualizado extends Mailable
{
    use Queueable, SerializesModels;

    public $itempedido;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ItemPedido $itempedido)
    {
        $this->itempedido = $itempedido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->replyTo('marcosdenersoshelp@hotmail.com', 'LCD Admin');
        $this->subject('LCD Sistema: Item do Pedido '.$this->itempedido->pedido->id.' foi atualizado');
        return $this->view('mails.itempedidoatualizado');
    }
}
