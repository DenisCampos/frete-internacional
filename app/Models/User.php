<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContracts;
use \Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContracts;

class User extends Model implements AuthenticatableContracts, CanResetPasswordContracts
{
    use Notifiable, Authenticatable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    
    protected $fillable = [
        'name', 
        'tipo', 
        'cpf', 
        'rg', 
        'email', 
        'contato', 
        'password', 
        'endereco', 
        'bairro', 
        'numero', 
        'complemento', 
        'cidade', 
        'uf', 
        'pais', 
        'cep'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

      /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
