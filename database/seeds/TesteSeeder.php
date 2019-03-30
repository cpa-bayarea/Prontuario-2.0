<?php

use Illuminate\Database\Seeder;

class TesteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('testes')->insert([
            
            'nome' => 'teste1',
            'descricao' => 'Teste1 da ACL', 
            'user_id'=>1
           
        ]);
        
        DB::table('testes')->insert([
            
            'nome' => 'teste2',
            'descricao' => 'Teste1 da ACL', 
            'user_id'=>2
           
        ]);
        
        DB::table('testes')->insert([
            
            'nome' => 'teste3',
            'descricao' => 'Teste1 da ACL', 
            'user_id'=>3
           
        ]);
        
    }
}
