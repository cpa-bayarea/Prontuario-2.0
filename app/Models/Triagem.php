<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Triagem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'queixa_principal', 
    ];

    /**
     * Relacionamento de Triagem com Paciente
     */
    public function paciente()
    {
        return $this->belongsTo('App\Models\Paciente', 'paciente_id');
    }

    public function aluno() {
        return $this->belongsTo('App\Models\Aluno','aluno_id');
    }

    public function supervisor() {
        return $this->belongsTo('App\Models\Supervisor','supervisor_id');
    }

    public function triagem() {
        return $this->hasMany('App\Models\Supervisor','supervisor_id');
    }
    // public function triagemItensGrupo() {
    //     return $this->hasMany('App\TriagemItensGrupo','triagems_id');
    // }

}
