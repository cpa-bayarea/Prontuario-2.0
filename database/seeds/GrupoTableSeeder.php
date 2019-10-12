<?php

use Illuminate\Database\Seeder;
use \App\Grupo;

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
            'nome' => 'Tipo de Atendimento',
        ]);
        Grupo::create([
            'nome' => 'Grupo',
        ]);
        Grupo::create([
            'nome' => 'Temporário',
        ]);
    }
}


