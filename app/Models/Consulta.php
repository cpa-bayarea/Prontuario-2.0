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
        return $this->belongsTo(App\Models\Aluno::class, 'aluno_id', 'id');
    }

    /**
     * Relacionamento de consulta com paciente
     */
    public function paciente()
    {
        return $this->belongsTo(App\Models\Paciente::class, 'paciente_id', 'id');
    }

    /**
     * Relacionamento de consulta com supervisor
     */
    public function supervisor()
    {
        return $this->belongsTo(App\Models\Supervisor::class, 'paciente_id', 'id');
    }
}
