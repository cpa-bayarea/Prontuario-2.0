<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendamentoStatus extends Model
{
    protected $table = 'agendamento_status';
    protected $fillable = ['nome'];
}
