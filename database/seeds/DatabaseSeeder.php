<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            CityTableSeeder::class,
            StateTableSeeder::class,
            LinhaTeoricaSeeder::class,
            StatusTableSeeder::class,
            ProntuarioStatusTableSeeder::class,
            AgendamentoStatusTableSeeder::class,
            GrupoTableSeeder::class,
            ItensGrupoTableSeeder::class,
            RoleSeeder::class,
        ]);
    }
}
