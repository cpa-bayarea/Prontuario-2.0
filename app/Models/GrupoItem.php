<?php

namespace App\Models;

class GrupoItem extends \App\Models\Base\GrupoItem
{
	protected $fillable = [
		'nome',
		'grupo_id',
		'ordem',
		'outro'
	];
}
