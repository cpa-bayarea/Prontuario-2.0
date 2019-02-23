<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerfilModel extends Model
{
    protected $table = 'tb_perfil';
    public $timestamps = FALSE;
    protected $primaryKey = 'id_perfil';
    protected $fillable = [
        'tx_name',
        'tx_desc',
        'status',
    ];
}
