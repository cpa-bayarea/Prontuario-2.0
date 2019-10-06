<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Supervisor
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
 * @property \App\Models\LinhaTeorica $tb_linha_teorica
 * @property \Illuminate\Database\Eloquent\Collection $tb_alunos
 *
 * @package App\Models\Base
 */
class Supervisor extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'tb_supervisor';

	protected $casts = [
		'linha_id' => 'int'
	];

	public function linhateorica()
	{
		return $this->belongsTo(\App\Models\LinhaTeorica::class, 'linha_id');
	}

	public function tb_alunos()
	{
		return $this->hasMany(\App\Models\Aluno::class, 'supervisor_id');
	}
}
