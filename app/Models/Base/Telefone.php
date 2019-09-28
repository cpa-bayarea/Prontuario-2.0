<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Telefone
 * 
 * @property int $id
 * @property string $ddd
 * @property string $numero
 * @property int $id_user
 * @property int $paciente_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Paciente $paciente
 *
 * @package App\Models\Base
 */
class Telefone extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'id_user' => 'int',
		'paciente_id' => 'int'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'id_user');
	}

	public function paciente()
	{
		return $this->belongsTo(\App\Models\Paciente::class);
	}
}
