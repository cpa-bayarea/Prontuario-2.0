<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'telefone',
        'id_user',
        'id_paciente'
    ];


}
