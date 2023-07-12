<?php

namespace Database\Seeders\ERP\Painel;

use App\Models\ERP\Painel\TipoMovimento;
use Illuminate\Database\Seeder;

class TipoMovimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoMovimento::create([
            'tipo_movimento'     => 'Entrada Avulsa',
            'ent_sai'    => 'E',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Entrada Por Ajuste de Balanço',
            'ent_sai'    => 'E',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Entrada Por Ordem de Compra',
            'ent_sai'    => 'E',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Entrada Por Ordem de Produção',
            'ent_sai'    => 'S',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Saida Avulsa',
            'ent_sai'    => 'S',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Saida Por Perda',
            'ent_sai'    => 'S',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Saida Por Venda do Produto',
            'ent_sai'    => 'S',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Saida Por Ordem de Produção',
            'ent_sai'    => 'S',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Saida Por Ajuste de Balanço',
            'ent_sai'    => 'S',
            'movimenta_estoque'    => 'S'
        ]);

        TipoMovimento::create([
            'tipo_movimento'     => 'Saida Para Consumo Interno',
            'ent_sai'    => 'S',
            'movimenta_estoque'    => 'S'
        ]);
    }
}
