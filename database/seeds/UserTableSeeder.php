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
        \DB::table('users')->insert(array (
            0 =>
                array (
                    'username' => '1234567',
                    'nu_telefone' => '23565656',
                    'name' => 'admin',
                    'email' => 'admin@gmail.com',
                    'password' => bcrypt('admin'),
                ),
            ));
    }
}
