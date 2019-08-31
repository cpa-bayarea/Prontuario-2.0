<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['nome','nome_social','nome_responsavel','data_nascimento','cpf','rg','endereco','cidade_id','email'];



    public function cidade(){
        return $this->hasOne('App\Cidade','id','cidade_id');
    }

    public function telefones(){
        return $this->hasMany('App\Telefone');
    }


}
