<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    protected $fillable = ['ddd','numero','paciente_id'];


    public function paciente(){
        return $this->belongsTo('App\Paciente','id','paciente_id');
    }


}
