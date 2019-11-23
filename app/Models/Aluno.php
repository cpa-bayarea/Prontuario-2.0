<?php

namespace App\Models;

class Aluno extends AbstractModel
{
    protected $table = 'alunos';
    protected $fillable = [
        'nu_semestre', 'supervisor_id', 'user_id'
    ];

    /**
     * Relacionamento de supervisor com Aluno
     */
    public function supervisor()
    {
        return $this->belongsTo('App\Models\Supervisor', 'supervisor_id');
    }

    public function triagem() {
        return $this->hasMany('App\Models\Triagem');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
