<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinhaTeorica extends Model
{
    use SoftDeletes;
    protected $table = 'tb_linha_teorica';
    protected $primaryKey = 'id';
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
