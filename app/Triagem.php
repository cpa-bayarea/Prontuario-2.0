<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Triagem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'triador', 
        'supervisor', 
        'atendimento',
        'queixa_principal',
        'temporario',
        'id_paciente',
        'grupo',
        'outro',
    ];
     /**
     * Relacionamento de Triagem com Paciente
     */
    public function paciente() {
        return $this->belongsTo('App\Paciente','id_paciente');
    }
}
