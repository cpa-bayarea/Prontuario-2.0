<?php

namespace App\Models;

class Triagem extends AbstractModel
{
    protected $fillable = ['queixa_principal', 'aluno_id', 'paciente_id', 'supervisor_id'];

    /**
     * Relacionamento de Triagem com Paciente
     */
    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'paciente_id');
    }

    public function aluno()
    {
        return $this->belongsTo('App\Models\Aluno', 'aluno_id');
    }

    public function supervisor()
    {
        return $this->belongsTo('App\Models\Supervisor', 'supervisor_id');
    }

    public function triagem()
    {
        return $this->hasMany('App\Models\Supervisor', 'supervisor_id');
    }
}
