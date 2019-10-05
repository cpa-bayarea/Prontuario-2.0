<?php

namespace App\Models;

class Prontuario extends \App\Models\Base\Prontuario
{
	protected $fillable = [
		'numero',
		'aluno_id',
		'paciente_id',
		'prontuario_status_id',
		'valor'
	];
}
