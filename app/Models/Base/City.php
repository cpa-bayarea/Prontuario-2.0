<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:32 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class City
 * 
 * @property int $id
 * @property int $state_id
 * @property string $title
 * @property int $iso
 * @property int $iso_ddd
 * @property int $status
 * @property string $slug
 * @property int $population
 * @property float $lat
 * @property float $long
 * @property float $income_per_capita
 * 
 * @property \Illuminate\Database\Eloquent\Collection $pacientes
 *
 * @package App\Models\Base
 */
class City extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'state_id' => 'int',
		'iso' => 'int',
		'iso_ddd' => 'int',
		'status' => 'int',
		'population' => 'int',
		'lat' => 'float',
		'long' => 'float',
		'income_per_capita' => 'float'
	];

	public function pacientes()
	{
		return $this->hasMany(\App\Models\Paciente::class, 'cidade_id');
	}
}
