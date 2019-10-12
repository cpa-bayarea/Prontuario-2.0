<?php

use Illuminate\Database\Seeder;
use \App\GrupoItem;

class ItensGrupoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // Tipo de Atendimento
                GrupoItem::create([
                    'nome' => 'Criança',
                    'grupo_id' => 1,
                    'ordem' => 1,
                ]);
                GrupoItem::create([
                    'nome' => 'Adolescente',
                    'grupo_id' => 1,
                    'ordem' => 2,
                ]);
                GrupoItem::create([
                    'nome' => 'Adulto',
                    'grupo_id' => 1,
                    'ordem' => 3,
                ]);
                GrupoItem::create([
                    'nome' => 'Idoso',
                    'grupo_id' => 1,
                    'ordem' => 4,
                ]);
                // Grupo
                GrupoItem::create([
                    'nome' => 'Criança',
                    'grupo_id' => 2,
                    'ordem' => 1,
                ]);
                GrupoItem::create([
                    'nome' => 'Mulheres',
                    'grupo_id' => 2,
                    'ordem' => 2,
                ]);
                GrupoItem::create([
                    'nome' => 'Homens',
                    'grupo_id' => 2,
                    'ordem' => 3,
                ]);
                GrupoItem::create([
                    'nome' => 'Educação Familiar',
                    'grupo_id' => 2,
                    'ordem' => 4,
                ]);
                // Temporário
                GrupoItem::create([
                    'nome' => 'Familiar',
                    'grupo_id' => 3,
                    'ordem' => 1,
                ]);
                GrupoItem::create([
                    'nome' => 'casal',
                    'grupo_id' => 3,
                    'ordem' => 2,
                ]);
                GrupoItem::create([
                    'nome' => 'outro',
                    'grupo_id' => 3,
                    'ordem' => 3,
                    'outro' => 'qual?'
                ]);
    }
}
