<?php

namespace Database\Seeders\ERP\Painel;

use App\Models\ERP\Painel\Resource;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Home / Geral
        Resource::create([
            'nome' => 'Home Index',
            'resource' => 'home',
        ]);

        Resource::create([
            'nome' => 'Cadastro geral',
            'resource' => 'cadastro.geral',
        ]);

        Resource::create([
            'nome' => 'Config Geral',
            'resource' => 'config.geral',
        ]);
        //Home / Geral


        //Role
        Resource::create([
            'nome' => 'Role Index',
            'resource' => 'role.index',
        ]);

        Resource::create([
            'nome' => ' Role Create',
            'resource' => 'role.create',
        ]);

        Resource::create([
            'nome' => 'Role Store',
            'resource' => 'role.store',
        ]);

        Resource::create([
            'nome' => 'Role Show',
            'resource' => 'role.show',
        ]);

        Resource::create([
            'nome' => 'Role Edit',
            'resource' => 'role.edit',
        ]);

        Resource::create([
            'nome' => ' Role Update',
            'resource' => 'role.update',
        ]);

        Resource::create([
            'nome' => 'Role Destroy',
            'resource' => 'role.destroy',
        ]);
        //Role

        //Resource
        Resource::create([
            'nome' => 'Resource Index',
            'resource' => 'resource.index',
        ]);

        Resource::create([
            'nome' => ' Resource Create',
            'resource' => 'resource.create',
        ]);

        Resource::create([
            'nome' => 'Resource Store',
            'resource' => 'resource.store',
        ]);

        Resource::create([
            'nome' => 'Resource Show',
            'resource' => 'resource.show',
        ]);

        Resource::create([
            'nome' => 'Resource Edit',
            'resource' => 'resource.edit',
        ]);

        Resource::create([
            'nome' => ' Resource Update',
            'resource' => 'resource.update',
        ]);

        Resource::create([
            'nome' => 'Resource Destroy',
            'resource' => 'resource.destroy',
        ]);
        //Resource

        //role.resources
        Resource::create([
            'nome' => 'Role Resources',
            'resource' => 'role.resources',
        ]);
        //role.resources

        //Categoria
        Resource::create([
            'nome' => 'Categoria Index',
            'resource' => 'categoria.index',
        ]);

        Resource::create([
            'nome' => ' Categoria Create',
            'resource' => 'categoria.create',
        ]);

        Resource::create([
            'nome' => 'Categoria Store',
            'resource' => 'categoria.store',
        ]);

        Resource::create([
            'nome' => 'Categoria Show',
            'resource' => 'categoria.show',
        ]);

        Resource::create([
            'nome' => 'Categoria Edit',
            'resource' => 'categoria.edit',
        ]);

        Resource::create([
            'nome' => ' Categoria Update',
            'resource' => 'categoria.update',
        ]);

        Resource::create([
            'nome' => 'Categoria Destroy',
            'resource' => 'categoria.destroy',
        ]);
        //Categoria

        //Unidade
        Resource::create([
            'nome' => 'Unidade Index',
            'resource' => 'unidade.index',
        ]);

        Resource::create([
            'nome' => ' Unidade Create',
            'resource' => 'unidade.create',
        ]);

        Resource::create([
            'nome' => 'Unidade Store',
            'resource' => 'unidade.store',
        ]);

        Resource::create([
            'nome' => 'Unidade Show',
            'resource' => 'unidade.show',
        ]);

        Resource::create([
            'nome' => 'Unidade Edit',
            'resource' => 'unidade.edit',
        ]);

        Resource::create([
            'nome' => ' Unidade Update',
            'resource' => 'unidade.update',
        ]);

        Resource::create([
            'nome' => 'Unidade Destroy',
            'resource' => 'unidade.destroy',
        ]);
        //Unidade
    }
}
