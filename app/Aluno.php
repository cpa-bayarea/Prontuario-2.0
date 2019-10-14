<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

    protected $table = 'tb_aluno';
    protected $primaryKey = 'id';

    protected $fillable = [
        'tx_nome', 'username', 'nu_telefone', 'nu_celular', 'nu_semestre',
//        'status',
        'supervisor_id'
    ];

    /**
     * Relacionamento de supervisor com Aluno
     */
    public function supervisor()
    {
        return $this->belongsTo('App\Supervisor', 'supervisor_id', 'id');
    }

    public function triagem() {
        return $this->hasMany('App\Triagem');
    }

}
