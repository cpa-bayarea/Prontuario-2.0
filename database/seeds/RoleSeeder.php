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
               
                'name' => 'SuperAdmin',
                'descricao' => 'Acesso total ao sistema'
            ),
            1 => array(
                'name' => 'Admin'                
            ),
            2 => array(
                'name' => 'Supervisor'                
            ),
            3 => array(
                'name' => 'Aluno'
            )
      ));
    }
}
