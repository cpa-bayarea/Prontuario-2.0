<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbAluno
 * 
 * @property int $id
 * @property string $tx_nome
 * @property string $username
 * @property string $nu_telefone
 * @property string $nu_celular
 * @property string $nu_semestre
 * @property int $supervisor_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\TbSupervisor $tb_supervisor
 * @property \Illuminate\Database\Eloquent\Collection $agendamentos
 * @property \Illuminate\Database\Eloquent\Collection $prontuarios
 *
 * @package App\Models\Base
 */
class TbAluno extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'tb_aluno';

	protected $casts = [
		'supervisor_id' => 'int'
	];

	public function tb_supervisor()
	{
		return $this->belongsTo(\App\Models\TbSupervisor::class, 'supervisor_id');
	}

	public function agendamentos()
	{
		return $this->hasMany(\App\Models\Agendamento::class, 'aluno_id');
	}

	public function prontuarios()
	{
		return $this->hasMany(\App\Models\Prontuario::class, 'aluno_id');
	}
}
