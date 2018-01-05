<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pacote extends Model
{
    protected $table = 'pacotes';

    protected $fillable = [
        'titulo',
        'descricao'
    ];
}
