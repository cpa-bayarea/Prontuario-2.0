<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfisModel extends Model
{
    protected $table = 'tb_perfil';
    public $timestamps = FALSE;
    protected $primaryKey = 'id_perfil';
    protected $fillable = [
        'tx_nome',
        'tx_desc',
        'status',
    ];
}
