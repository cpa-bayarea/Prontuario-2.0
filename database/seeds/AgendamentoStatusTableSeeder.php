<?php

use Illuminate\Database\Seeder;

class AgendamentoStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendamento_status')->insert([
            ['tx_nome' => 'Agendado'],
            ['tx_nome' => 'Confirmado'],
            ['tx_nome' => 'Cancelado'],
        ]);
    }
}
