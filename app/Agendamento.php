<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agendamento extends Model
{
    use SoftDeletes;

    protected $table = 'agendamentos';

    protected $fillable = ['title','start_date','end_date'];

}
