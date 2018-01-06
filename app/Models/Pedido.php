<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pedido extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pedidos';

    protected $fillable = [
        'user_id',
        'pacote_id',
        'status',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pacote()
    {
        return $this->belongsTo(Produto::class, 'pacote_id');
    }

}
