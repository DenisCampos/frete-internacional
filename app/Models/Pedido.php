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
        return $this->belongsTo(Pacote::class, 'pacote_id');
    }

    public function getStatus($status)
    {
        if($status==0){
            return "Criado";
        }else if($status==1){
            return "Enviado";
        }else if($status==2){
            return "Em Análise";
        }else if($status==3){
            return "Aceito";
        }else if($status==4){
            return "Itens Recebidos Parcialmente";
        }else if($status==5){
            return "Todos os Itens Recebidos";
        }else if($status==6){
            return "Em Transporte ao Cliente";
        }else if($status==7){
            return "Finalizado";
        }else if($status==8){
            return "Cancelado";
        }
        
    }
}
