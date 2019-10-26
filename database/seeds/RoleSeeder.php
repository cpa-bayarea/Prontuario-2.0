<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('roles')->insert(array (
            0 => array (               
                'nome' => 'SuperAdmin'               
            ),
            1 => array(
                'nome' => 'Admin'                
            ),
            2 => array(
                'nome' => 'Supervisor'                
            ),
            3 => array(
                'nome' => 'Aluno'
            )
      ));
    }
}
