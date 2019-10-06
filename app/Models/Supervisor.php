<?php

namespace App\Models;

class Supervisor extends \App\Models\Base\Supervisor
{
	protected $fillable = [
		'tx_nome',
		'username',
		'nu_telefone',
		'nu_celular',
		'nu_crp',
		'linha_id'
	];
}
