<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProntuarioStatus extends AbstractModel
{
    protected $table = 'prontuario_status';
    protected $fillable = ['nome'];
}
