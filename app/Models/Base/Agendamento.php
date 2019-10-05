<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:32 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Agendamento
 * 
 * @property int $id
 * @property string $title
 * @property string $color
 * @property string $start
 * @property string $end
 * @property int $aluno_id
 * @property int $paciente_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\TbAluno $tb_aluno
 * @property \App\Models\Paciente $paciente
 *
 * @package App\Models\Base
 */
class Agendamento extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'aluno_id' => 'int',
		'paciente_id' => 'int'
	];

	public function tb_aluno()
	{
		return $this->belongsTo(\App\Models\TbAluno::class, 'aluno_id');
	}

	public function paciente()
	{
		return $this->belongsTo(\App\Models\Paciente::class);
	}
}
