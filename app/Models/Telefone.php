<?php

namespace App\Models;

class Telefone extends \App\Models\Base\Telefone
{
	protected $fillable = [
		'ddd',
		'numero',
		'id_user',
		'paciente_id'
	];
}
