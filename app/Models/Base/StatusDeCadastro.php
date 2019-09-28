<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class StatusDeCadastro
 * 
 * @property int $id
 * @property string $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $pacientes
 *
 * @package App\Models\Base
 */
class StatusDeCadastro extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	public function pacientes()
	{
		return $this->hasMany(\App\Models\Paciente::class, 'id_status');
	}
}
