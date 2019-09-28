<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Triagem
 * 
 * @property int $id
 * @property string $triador
 * @property string $supervisor
 * @property string $queixa_principal
 * @property string $atendimento
 * @property string $grupo
 * @property string $outro
 * @property string $temporario
 * @property int $paciente_ids
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\Paciente $paciente
 *
 * @package App\Models\Base
 */
class Triagem extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'paciente_ids' => 'int'
	];

	public function paciente()
	{
		return $this->belongsTo(\App\Models\Paciente::class, 'paciente_ids');
	}
}
