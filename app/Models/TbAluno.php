<?php

namespace App\Models;

class TbAluno extends \App\Models\Base\TbAluno
{
	protected $fillable = [
		'tx_nome',
		'username',
		'nu_telefone',
		'nu_celular',
		'nu_semestre',
		'supervisor_id'
	];
}
