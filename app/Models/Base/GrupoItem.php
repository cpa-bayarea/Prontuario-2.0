<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:32 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class GrupoItem
 * 
 * @property int $id
 * @property string $nome
 * @property int $grupo_id
 * @property int $ordem
 * @property string $outro
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Grupo $grupo
 *
 * @package App\Models\Base
 */
class GrupoItem extends Eloquent
{
	protected $casts = [
		'grupo_id' => 'int',
		'ordem' => 'int'
	];

	public function grupo()
	{
		return $this->belongsTo(\App\Models\Grupo::class);
	}
}
