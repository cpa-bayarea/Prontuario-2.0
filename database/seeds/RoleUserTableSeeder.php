<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('role_users')->insert(array(
            0 =>
                array(
                    'user_id' => '1',
                    'role_id' => '1'
                ),
            1 =>
                array(
                    'user_id' => '2',
                    'role_id' => '2'
                )
        ));
    }
}
