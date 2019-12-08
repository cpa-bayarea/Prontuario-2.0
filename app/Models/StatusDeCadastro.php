<?php

namespace App\Models;

class StatusDeCadastro extends AbstractModel
{
    const STATUS_PRE_CADASTRADO = 1;
    const STATUS_CADASTRADO = 2;

    protected $fillable = ['status'];
}
