<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Prontuario
 * 
 * @property int $id
 * @property int $numero
 * @property int $aluno_id
 * @property int $paciente_id
 * @property int $prontuario_status_id
 * @property float $valor
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Aluno $tb_aluno
 * @property \App\Models\Paciente $paciente
 * @property \App\Models\ProntuarioStatus $prontuario_status
 *
 * @package App\Models\Base
 */
class Prontuario extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'numero' => 'int',
		'aluno_id' => 'int',
		'paciente_id' => 'int',
		'prontuario_status_id' => 'int',
		'valor' => 'float'
	];

	public function tb_aluno()
	{
		return $this->belongsTo(\App\Models\Aluno::class, 'aluno_id');
	}

	public function paciente()
	{
		return $this->belongsTo(\App\Models\Paciente::class);
	}

	public function prontuario_status()
	{
		return $this->belongsTo(\App\Models\ProntuarioStatus::class);
	}
}
