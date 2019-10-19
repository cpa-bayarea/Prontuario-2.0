<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AbstractModel;

class Prontuario extends AbstractModel
{
    protected $fillable = ['numero', 'paciente_id', 'aluno_id', 'valor', 'prontuario_status_id'];
    protected $floats = ['valor'];
}
