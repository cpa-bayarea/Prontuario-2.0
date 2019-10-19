<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supervisor extends Model
{
    use SoftDeletes;
    protected $table = 'tb_supervisor';
    protected $primaryKey = 'id';
    protected $fillable = [
        'tx_nome', 'username', 'nu_telefone', 'nu_celular', 'nu_crp',
//        'status',
        'linha_id'
    ];

    /**
     * Relacionamento de linha teorica com supervisor
     */
    public function linhateorica()
    {
        return $this->belongsTo('App\Models\LinhaTeorica', 'linha_id', 'id');
    }
}
