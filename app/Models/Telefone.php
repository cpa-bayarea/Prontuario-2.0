<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    use SoftDeletes;
    protected $fillable = ['ddd', 'numero', 'paciente_id'];

    public function paciente()
    {
        return $this->belongsTo('App\Paciente', 'id', 'paciente_id');
    }
}
