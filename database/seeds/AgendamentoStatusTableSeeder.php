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
            ['nome'=>'Agendado'],
            ['nome'=>'Confirmado'],
            ['nome'=>'Cancelado'],
        ]);
    }
}
