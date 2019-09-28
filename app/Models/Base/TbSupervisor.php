<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbSupervisor
 * 
 * @property int $id
 * @property string $tx_nome
 * @property string $username
 * @property string $nu_telefone
 * @property string $nu_celular
 * @property string $nu_crp
 * @property int $linha_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\TbLinhaTeorica $tb_linha_teorica
 * @property \Illuminate\Database\Eloquent\Collection $tb_alunos
 *
 * @package App\Models\Base
 */
class TbSupervisor extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'tb_supervisor';

	protected $casts = [
		'linha_id' => 'int'
	];

	public function tb_linha_teorica()
	{
		return $this->belongsTo(\App\Models\TbLinhaTeorica::class, 'linha_id');
	}

	public function tb_alunos()
	{
		return $this->hasMany(\App\Models\TbAluno::class, 'supervisor_id');
	}
}
