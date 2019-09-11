<?php


use Illuminate\Database\Seeder;


class ProntuarioStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('prontuario_status')->insert([
            ['nome'=>'Em Atendimento'],
            ['nome'=>'Somente Triagem'],
            ['nome'=>'Plantão'],
        ]);
    }
}
