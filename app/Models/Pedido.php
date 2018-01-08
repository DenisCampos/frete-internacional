<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pedido extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pedidos';

    /*

    0 -> Criado
    1 -> Enviado
    2 -> Em Análise
    3 -> Aceito
    4 -> Transporte
    5 -> Finalizado
    6 -> Cancelado

    */

    protected $fillable = [
        'user_id',
        'pacote_id',
        'rastreio',
        'obs_cliente',
        'obs_admin',
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

    public function getStatusAttribute($status)
    {
        switch($status){
            case 0:
                return "Criado";
                break;
            case 1:
                return "Enviado";
                break;
            case 2:
                return "Em Análise";
                break;
            case 3:
                return "Aceito";
                break;
            case 4:
                return "Transporte";
                break;
            case 5:
                return "Finalizado";
                break;
            case 6:
                return "Cancelado";
                break;
            
        }
    }
}
