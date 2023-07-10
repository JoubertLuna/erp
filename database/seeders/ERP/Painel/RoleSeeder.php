<?php

namespace Database\Seeders\ERP\Painel;

use App\Models\ERP\Painel\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'nome' => 'Super Administrador',
            'role' => 'Role_Super_Administrador',
        ]);
        Role::create([
            'nome' => 'User Cadastros',
            'role' => 'Role_Cadastros',
        ]);
        Role::create([
            'nome' => 'User Estoque',
            'role' => 'Role_Estoque',
        ]);
        Role::create([
            'nome' => 'User Compras',
            'role' => 'Role_Compras',
        ]);
        Role::create([
            'nome' => 'User Produção',
            'role' => 'Role_Producao',
        ]);
        Role::create([
            'nome' => 'User Vendas',
            'role' => 'Role_Vendas',
        ]);
        Role::create([
            'nome' => 'User Financeiro',
            'role' => 'Role_Financeiro',
        ]);
    }
}
