<?php

namespace App\Models;

class Supervisor extends AbstractModel
{
    protected $table = 'supervisores';
    protected $fillable = [
        'nu_crp', 'linha_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function linhateorica()
    {
        return $this->belongsTo('App\Models\LinhaTeorica', 'linha_id', 'id');
    }

    public function triagem()
    {
        return $this->hasMany('App\Models\Triagem');
    }

    public function aluno()
    {
        return $this->hasMany('App\Models\Aluno', 'supervisor_id');
    }

    /**
     * Mutator para exibicao formatada do valor de crp na lista de supervisores.
     *
     * @param $value
     * @return string
     */
    public function getNuCrpAttribute($value)
    {
        if (strlen($value) == 7) {
            $nu_crp = substr($value, 0, 3) .'/'. substr($value, 3, 4);
        } else {
            $nu_crp = $value;
        }
        return $nu_crp;
    }
}
