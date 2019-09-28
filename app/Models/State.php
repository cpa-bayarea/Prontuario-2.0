<?php

namespace App\Models;

class State extends \App\Models\Base\State
{
	protected $fillable = [
		'title',
		'letter',
		'iso',
		'slug',
		'population'
	];
}
