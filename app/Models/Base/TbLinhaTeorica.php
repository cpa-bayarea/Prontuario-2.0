<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TbLinhaTeorica
 * 
 * @property int $id
 * @property string $tx_nome
 * @property string $tx_desc
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $tb_supervisors
 *
 * @package App\Models\Base
 */
class TbLinhaTeorica extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'tb_linha_teorica';

	public function tb_supervisors()
	{
		return $this->hasMany(\App\Models\TbSupervisor::class, 'linha_id');
	}
}
