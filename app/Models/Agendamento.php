<?php

namespace App\Models;

class Agendamento extends \App\Models\Base\Agendamento
{
	protected $fillable = [
		'title',
		'color',
		'start',
		'end',
		'aluno_id',
		'paciente_id'
	];
}
