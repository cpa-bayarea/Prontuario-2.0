<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:32 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Grupo
 * 
 * @property int $id
 * @property string $nome
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $grupo_items
 *
 * @package App\Models\Base
 */
class Grupo extends Eloquent
{
	public function grupo_items()
	{
		return $this->hasMany(\App\Models\GrupoItem::class);
	}
}
