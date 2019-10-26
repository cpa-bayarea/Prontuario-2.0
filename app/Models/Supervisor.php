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
}
