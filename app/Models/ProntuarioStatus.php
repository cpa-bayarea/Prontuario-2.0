<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProntuarioStatus extends AbstractModel
{
    const P_STATUS_EM_ATENDIMENTO = 1;
    const P_SOMENTE_TRIAGEM = 2;
    const P_PLANTAO = 3;

    protected $table = 'prontuario_status';
    protected $fillable = ['nome'];
}
