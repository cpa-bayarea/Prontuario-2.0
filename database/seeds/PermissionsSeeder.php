<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            
            'nome' =>'teste.index',
            'descricao' => 'Permissao de listar os testes'
            
        ]);
        
         DB::table('permissions')->insert([
            
            'nome' =>'teste.create',
            'descricao' => 'Permissao de criar os testes'
            
        ]);
        
        DB::table('permissions')->insert([
            
            'nome' =>'teste.show',
            'descricao' => 'Permissao de criar os testes'
            
        ]);
        
        
         DB::table('permissions')->insert([
            
            'nome' =>'teste.delete',
            'descricao' => 'Permissao de criar os testes'
            
        ]);
        
        DB::table('permission_roles')->insert([
            
            'role_id' =>1,
            'permission_id' => 1
            
        ]);
        
         DB::table('permission_roles')->insert([
            
            'role_id' =>1,
            'permission_id' => 2
            
        ]);
        
         DB::table('permission_roles')->insert([
            
            'role_id' =>1,
            'permission_id' => 3
            
        ]);
        
         DB::table('permission_roles')->insert([
            
            'role_id' =>1,
            'permission_id' => 4
            
        ]);
        
         DB::table('permission_roles')->insert([
            
            'role_id' =>2,
            'permission_id' => 1
            
        ]);
        
         DB::table('permission_roles')->insert([
            
            'role_id' =>2,
            'permission_id' => 2
            
        ]);
        
        
         DB::table('permission_roles')->insert([
            
            'role_id' =>3,
            'permission_id' => 1
            
        ]);
        
         
        
         
        
        
    }
}
