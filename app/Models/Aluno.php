<?php

namespace App\Models;

class Aluno extends AbstractModel
{
    protected $table = 'alunos';
    protected $fillable = [
        'tx_nome', 'username', 'nu_telefone', 'nu_celular', 'nu_semestre', 'supervisor_id'
    ];

    /**
     * Relacionamento de supervisor com Aluno
     */
    public function supervisor()
    {
        return $this->belongsTo('App\Models\Supervisor', 'supervisor_id', 'id');
    }

    public function triagem() {
        return $this->hasMany('App\Models\Triagem');
    }

}
