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
            LinhaTeoricaTableSeeder::class,
            StatusTableSeeder::class,
            ProntuarioStatusTableSeeder::class,
            AgendamentoStatusTableSeeder::class,
            GrupoTableSeeder::class,
            ItensGrupoTableSeeder::class,
            RoleTableSeeder::class,
            RoleUserTableSeeder::class,
            PermissionsTableSeeder::class,
        ]);
    }
}
