<?php

use App\Models\{Aluno, User};
use Illuminate\Database\Seeder;

class TerapeutasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => '123844',
            'nu_telefone' => '99999999',
            'name' => 'Terapeuta 1',
            'email' => 'ter1@gmail.com',
            'password' => bcrypt('terapeuta'),
        ]);
        $user1 = User::create([
            'username' => '123321',
            'nu_telefone' => '99999999',
            'name' => 'Terapeuta 2',
            'email' => 'ter2@gmail.com',
            'password' => bcrypt('terapeuta'),
        ]);

        Aluno::create(['nu_semestre' => '10', 'supervisor_id' => 1, 'user_id' => $user1->id]);
        Aluno::create(['nu_semestre' => '10', 'supervisor_id' => 1, 'user_id' => $user->id]);
    }
}
