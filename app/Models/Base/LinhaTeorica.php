<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class LinhaTeorica
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
class LinhaTeorica extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'tb_linha_teorica';

	public function supervisor()
	{
		return $this->hasMany(\App\Models\Supervisor::class, 'linha_id');
	}
}
