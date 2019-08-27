<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Triagem extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'triador', 
        'supervisor', 
        'queixa_principal',
        'id_paciente'
    ];
}
