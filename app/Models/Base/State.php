<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class State
 * 
 * @property int $id
 * @property string $title
 * @property string $letter
 * @property int $iso
 * @property string $slug
 * @property int $population
 *
 * @package App\Models\Base
 */
class State extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'iso' => 'int',
		'population' => 'int'
	];
}
