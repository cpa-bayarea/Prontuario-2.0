<?php


use Illuminate\Database\Seeder;


class UserTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
            [
                'username' => '1234567',
                'nu_telefone' => '23565656',
                'name' => 'Super Usuário',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin'),
            ],
            [
                'username' => '7654321',
                'name' => 'admin',
                'nu_telefone' => '23565657',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
            ]
        ]);
    }
}
