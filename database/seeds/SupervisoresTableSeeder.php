<?php


use App\Models\{Supervisor, User};
use Illuminate\Database\Seeder;


class SupervisoresTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => '123123',
            'nu_telefone' => '99999999',
            'name' => 'Supervisor 1',
            'email' => 'sup1@gmail.com',
            'password' => bcrypt('supervisor'),
        ]);
        $user1 = User::create([
            'username' => '123321',
            'nu_telefone' => '99999999',
            'name' => 'Supervisor 2',
            'email' => 'sup2@gmail.com',
            'password' => bcrypt('supervisor'),
        ]);

        Supervisor::create(['user_id' => $user1->id, 'linha_id' => 1, 'nu_crp' => '1123217']);
        Supervisor::create(['user_id' => $user->id, 'linha_id' => 1, 'nu_crp' => '1122227']);
    }
}
