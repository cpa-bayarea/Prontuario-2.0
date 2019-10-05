<?php

namespace App\Models;

class Triagem extends \App\Models\Base\Triagem
{
	protected $fillable = [
		'triador',
		'supervisor',
		'queixa_principal',
		'atendimento',
		'grupo',
		'outro',
		'temporario',
		'paciente_ids'
	];
}
