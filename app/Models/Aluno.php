<?php

namespace App\Models;

class Aluno extends \App\Models\Base\Aluno
{
	protected $fillable = [
		'nome',
		'username',
		'telefone',
		'celular',
		'semestre',
		'supervisor_id'
	];
}
