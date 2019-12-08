<?php

namespace App\Models;

class AgendamentoStatus extends AbstractModel
{
    const AGSTATUS_AGENDADO   = 1;
    const AGSTATUS_CONFIRMADO = 2;
    const AGSTATUS_CANCELADO  = 3;

    protected $table = 'agendamento_status';
    protected $fillable = ['tx_nome'];
}
