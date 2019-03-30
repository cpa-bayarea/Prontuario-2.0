<?php

use Illuminate\Database\Seeder;
use \App\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         User::create([
//             'tx_nome'     => 'Super Usuário Prontuário Eletrônico',
//             'username'    => '123',
//             'status'      => 'A',
// //            'users_id'    => '', # Não terá relacionamento
//             'nu_telefone' => '(61) 3232-3232',
//             'nu_celular'  => '(61) 9191-9191',
//             'tx_email'    => 'su@su.com',
//             'nu_semestre' => '',
//             'nu_crp'      => '',
// //            'id_linha'    => '', # Não terá Linha Teórica
//             'id_perfil'   => '1',
//             'password'    => bcrypt('123123'),
//         ]);

        DB::table('users')->insert([
            
            'username' => '17114290048',
            'password' => bcrypt('123456')
           
        ]);
        
        DB::table('users')->insert([
            
            'username' => '17114290049',
            'password' => bcrypt('123456')
           
        ]);
        
         DB::table('users')->insert([
            
            'username' => '17114290050',
            'password' => bcrypt('123456')
           
        ]);
        
        
        
        
    

    }
}
