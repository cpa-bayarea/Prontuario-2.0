<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProntuarioStatus extends AbstractModel
{
    protected $table = 'prontuario_status';
    protected $fillable = ['nome'];
}
