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
        DB::table('roles')->insert([
            
            'nome' =>'Admin',
            'descricao' => 'Quem irá ter acesso a todas as partes do sistema'
            
        ]);
        
        DB::table('roles')->insert([
            
            'nome' =>'Supervisor',
            'descricao' => 'Supervisor responsável pelos alunos'
            
        ]);
        
         DB::table('roles')->insert([
            
            'nome' =>'Aluno',
            'descricao' => 'Aluno que trabalha na clinica'
            
        ]);
        
        
        DB::table('role_users')->insert([
            
            'user_id' => 1,
            'role_id' => 1
           
        ]);
        
        DB::table('role_users')->insert([
            
            'user_id' => 2,
            'role_id' => 2
           
        ]);
        
         DB::table('role_users')->insert([
            
            'user_id' => 3,
            'role_id' => 3
           
        ]);
        
        
    }
}
