<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    # Constantes dos Perfi's
    const PFL_ADM        = 1;
    const PFL_ALUNO      = 2;
    const PFL_SUPERVISOR = 3;
    const PFL_SECRETARIA = 4;
//    const PFL_TERAPEUTA  = 5;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tx_nome',
        'username',
        'status',
        'users_id',
        'nu_telefone',
        'nu_celular',
        'tx_email',
        'nu_semestre',
        'nu_crp',
        'id_linha',
        'id_perfil',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
