<?php

namespace App\Models;

class Paciente extends \App\Models\Base\Paciente
{
	protected $fillable = [
		'nome',
		'nome_social',
		'nome_responsavel',
		'data_nascimento',
		'cpf',
		'rg',
		'endereco',
		'email',
		'cidade_id',
		'id_status'
	];
}
