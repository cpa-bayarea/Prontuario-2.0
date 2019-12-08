<?php

namespace App\Models;

class Prontuario extends AbstractModel
{
    protected $fillable = ['numero', 'paciente_id', 'aluno_id', 'valor', 'prontuario_status_id'];
    protected $floats = ['valor'];
}
