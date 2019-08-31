<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('status_de_cadastros')->insert(array (
            0 =>
                array (
                    'status' => 'Pré Cadastrado',
                ),
            1 =>
                array (
                    'status' => 'Cadastrado',
                ),
            ));
    }
}
