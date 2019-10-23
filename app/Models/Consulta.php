<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use SoftDeletes;

    protected $table = 'consultas';
    protected $fillable = [
        'paciente_id', 'data', 'supervisor_id', 'aluno_id', 'relato'
    ];

    /**
     * Relacionamento de consulta com aluno
     */
    public function aluno()
    {
        return $this->hasOne('App\Models\Aluno', 'id', 'aluno_id');
    }

    /**
     * Relacionamento de consulta com paciente
     */
    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente', 'id', 'paciente_id');
    }

    /**
     * Relacionamento de consulta com supervisor
     */
    public function supervisor()
    {
        return $this->hasOne('App\Models\Supervisor', 'id', 'supervisor_id');
    }
}
