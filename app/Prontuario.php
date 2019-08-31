<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AbstractModel;

class Prontuario extends AbstractModel
{
    protected $fillable = ['numero', 'paciente_id', 'aluno_id', 'valor', 'prontuario_status_id'];
    protected $floats = ['valor'];
}
