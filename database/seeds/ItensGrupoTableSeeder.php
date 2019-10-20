<?php

use Illuminate\Database\Seeder;
use \App\Models\GrupoItem;

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
                    'tx_nome' => 'Criança',
                    'grupo_id' => 1,
                    'nu_ordem' => 1,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'Adolescente',
                    'grupo_id' => 1,
                    'nu_ordem' => 2,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'Adulto',
                    'grupo_id' => 1,
                    'nu_ordem' => 3,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'Idoso',
                    'grupo_id' => 1,
                    'nu_ordem' => 4,
                ]);
                // Grupo
                GrupoItem::create([
                    'tx_nome' => 'Criança',
                    'grupo_id' => 2,
                    'nu_ordem' => 1,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'Mulheres',
                    'grupo_id' => 2,
                    'nu_ordem' => 2,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'Homens',
                    'grupo_id' => 2,
                    'nu_ordem' => 3,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'Educação Familiar',
                    'grupo_id' => 2,
                    'nu_ordem' => 4,
                ]);
                // Temporário
                GrupoItem::create([
                    'tx_nome' => 'Familiar',
                    'grupo_id' => 3,
                    'nu_ordem' => 1,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'casal',
                    'grupo_id' => 3,
                    'nu_ordem' => 2,
                ]);
                GrupoItem::create([
                    'tx_nome' => 'outro',
                    'grupo_id' => 3,
                    'nu_ordem' => 3,
                    'tx_outro' => 'qual?'
                ]);
    }
}
