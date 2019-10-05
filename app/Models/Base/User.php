<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $telefones
 *
 * @package App\Models\Base
 */
class User extends Eloquent
{
	protected $dates = [
		'email_verified_at'
	];

	public function telefones()
	{
		return $this->hasMany(\App\Models\Telefone::class, 'id_user');
	}
}
