<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pacote extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pacotes';

    protected $fillable = [
        'titulo',
        'descricao',
        'status'
    ];
}
