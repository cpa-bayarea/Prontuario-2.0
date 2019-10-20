<?php

use Illuminate\Database\Seeder;
use \App\Models\Grupo;

class GrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grupo::create([
            'tx_nome' => 'Tipo de Atendimento',
        ]);
        Grupo::create([
            'tx_nome' => 'Grupo',
        ]);
        Grupo::create([
            'tx_nome' => 'Temporário',
        ]);
    }
}


