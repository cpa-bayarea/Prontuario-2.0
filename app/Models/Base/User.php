<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:33 +0000.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection $telefones
 *
 * @package App\Models\Base
 */
class User extends Authenticatable {
	protected $dates = [
		'email_verified_at'
	];

	public function telefones()
	{
		return $this->hasMany(\App\Models\Telefone::class, 'id_user');
	}
}
