<?php

namespace App\Models;

class LinhaTeorica extends AbstractModel
{
    protected $table = 'linhas_teoricas';

    protected $fillable = [
        'tx_nome', 'tx_desc'
    ];

    /**
     * Relacionamento de linha teórica com Supervisor.
     */
    public function getSupervisor()
    {
        return $this->hasMany('App\Models\Supervisor');
    }
}
