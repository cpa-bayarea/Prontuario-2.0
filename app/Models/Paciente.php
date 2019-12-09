<?php

namespace App\Models;

class Paciente extends AbstractModel
{
    protected $fillable = [
        'tx_nome', 'tx_nome_social', 'tx_nome_responsavel', 'dt_nascimento', 'nu_cep', 'nu_cpf', 'nu_rg', 'tx_uf',
        'tx_logradouro', 'tx_email', 'tx_complemento', 'tx_bairro', 'tx_localidade'
    ];

    public function cidade()
    {
        return $this->hasOne('App\Models\Cidade', 'id', 'cidade_id');
    }

    public function telefones()
    {
        return $this->hasMany('App\Models\Telefone');
    }

    public function triagem()
    {
        return $this->hasOne('App\Models\Triagem');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\StatusDeCadastro', 'status_id');
    }

    /**
     * Mutator para formatação de número de cpf.
     *
     * @param $value
     * @return string
     */
    public function getNuCpfAttribute($value)
    {
        if (strlen($value) == 11)
            return preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $value);

        return $value;
    }
}
