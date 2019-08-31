<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Paciente extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome',
        'nome_social',
        'nome_responsavel',
        'data_nascimento',
        'cpf',
        'rg',
        'endereco',
        'cidade_id',
        'email',
        'id_status'
    ];


    public function cidade(){

        return $this->hasOne('App\Cidade','id','cidade_id');
    }
}
