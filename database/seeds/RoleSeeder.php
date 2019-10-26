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
<<<<<<< HEAD
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
=======
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
>>>>>>> d4966979e4eb21634ccb7aadb46aaf5db3538eec
            )
      ));
    }
}
