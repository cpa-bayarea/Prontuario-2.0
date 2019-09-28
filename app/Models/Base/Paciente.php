<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 28 Sep 2019 17:48:32 +0000.
 */

namespace App\Models\Base;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Paciente
 * 
 * @property int $id
 * @property string $nome
 * @property string $nome_social
 * @property string $nome_responsavel
 * @property \Carbon\Carbon $data_nascimento
 * @property string $cpf
 * @property string $rg
 * @property string $endereco
 * @property string $email
 * @property int $cidade_id
 * @property int $id_status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $deleted_at
 * 
 * @property \App\Models\City $city
 * @property \App\Models\StatusDeCadastro $status_de_cadastro
 * @property \Illuminate\Database\Eloquent\Collection $agendamentos
 * @property \Illuminate\Database\Eloquent\Collection $prontuarios
 * @property \Illuminate\Database\Eloquent\Collection $telefones
 * @property \Illuminate\Database\Eloquent\Collection $triagems
 *
 * @package App\Models\Base
 */
class Paciente extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'cidade_id' => 'int',
		'id_status' => 'int'
	];

	protected $dates = [
		'data_nascimento'
	];

	public function city()
	{
		return $this->belongsTo(\App\Models\City::class, 'cidade_id');
	}

	public function status_de_cadastro()
	{
		return $this->belongsTo(\App\Models\StatusDeCadastro::class, 'id_status');
	}

	public function agendamentos()
	{
		return $this->hasMany(\App\Models\Agendamento::class);
	}

	public function prontuarios()
	{
		return $this->hasMany(\App\Models\Prontuario::class);
	}

	public function telefones()
	{
		return $this->hasMany(\App\Models\Telefone::class);
	}

	public function triagems()
	{
		return $this->hasMany(\App\Models\Triagem::class, 'paciente_ids');
	}
}
