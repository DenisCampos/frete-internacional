<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ItemPedido extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'itenspedido';

    protected $fillable = [
        'pedido_id',
        'descricao',
        'quantidade',
        'preco',
        'cor',
        'peso',
        'link',
        'obs_cliente',
        'obs_admin',
    ];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }
}
