<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusDeCadastro extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'status', 
    ];
}
