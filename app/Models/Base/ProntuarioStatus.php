<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class ProntuarioStatus
 * 
 * @property int $id
 * @property string $nome
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $prontuarios
 *
 * @package App\Models\Base
 */
class ProntuarioStatus extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'prontuario_status';

	public function prontuarios()
	{
		return $this->hasMany(\App\Models\Prontuario::class);
	}
}
