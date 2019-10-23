<?php

namespace App\Models;

class Supervisor extends AbstractModel
{
    protected $table = 'supervisores';
    protected $fillable = [
        'tx_nome', 'username', 'nu_telefone', 'nu_celular', 'nu_crp', 'linha_id'
    ];

    /**
     * Relacionamento de linha teorica com supervisor
     */
    public function linhateorica()
    {
        return $this->belongsTo('App\Models\LinhaTeorica', 'linha_id', 'id');
    }

    public function triagem()
    {
        return $this->hasMany('App\Models\Triagem');
    }
}
