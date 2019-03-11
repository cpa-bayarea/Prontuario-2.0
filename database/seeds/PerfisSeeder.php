<?php

use Illuminate\Database\Seeder;
use \App\PerfisModel as Perfil;
class PerfisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Perfil::create([
            'tx_nome' => 'Gestor',
            'tx_desc' => 'Gerenciar o Prontuário Eletrônico',
            'status' => 'A',
        ]);

        Perfil::create([
            'tx_nome' => 'Supervisor',
            'tx_desc' => '-',
            'status' => 'A',
        ]);

        Perfil::create([
            'tx_nome' => 'Aluno',
            'tx_desc' => '-',
            'status' => 'A',
        ]);

        Perfil::create([
            'tx_nome' => 'Secretária',
            'tx_desc' => '-',
            'status' => 'A',
        ]);

    }
}
