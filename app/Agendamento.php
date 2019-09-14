<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agendamento extends Model
{
    use SoftDeletes;

    protected $table = 'agendamentos';

    protected $fillable = ['title','color','start','end','paciente_id','aluno_id'];

    /**
     * Relacionamento de agendamento com aluno
     */
    public function aluno()
    {
        return $this->belongsTo('App\Aluno', 'aluno_id', 'id');
    }

    /**
     * Relacionamento de agendamento com paciente
     */
    public function paciente()
    {
        return $this->belongsTo('App\Paciente', 'paciente_id', 'id');
    }

}
