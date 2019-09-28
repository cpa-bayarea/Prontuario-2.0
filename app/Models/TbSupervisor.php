<?php

namespace App\Models;

class TbSupervisor extends \App\Models\Base\TbSupervisor
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
