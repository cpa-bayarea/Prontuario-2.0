<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome', 'nome_social', 'nome_responsavel', 'data_nascimento', 'cpf', 'rg', 'endereco',
        'cidade_id', 'email', 'id_status'
    ];

    public function cidade()
    {
        return $this->hasOne('App\Models\Cidade', 'id', 'cidade_id');
    }

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone');
    }
    public function triagem(){
        return $this->hasOne('App\Models\Triagem');
    }

    public function status() {
        return $this->belongsTo('App\Models\StatusDeCadastro','id_status');
    }
}
