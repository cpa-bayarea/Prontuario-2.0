<?php

namespace App\Models;

class City extends \App\Models\Base\City
{
	protected $fillable = [
		'state_id',
		'title',
		'iso',
		'iso_ddd',
		'status',
		'slug',
		'population',
		'lat',
		'long',
		'income_per_capita'
	];
}
