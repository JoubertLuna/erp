<?php

namespace App\Providers;

use App\Models\ERP\Painel\{
    Categoria,
    Contato,
    Produto,
    Resource,
    Role,
    Unidade
};

use App\Observers\ERP\Painel\{
    CategoriaObserver,
    ContatoObserver,
    ProdutoObserver,
    ResourceObserver,
    RoleObserver,
    UnidadeObserver
};

use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Categoria::observe(CategoriaObserver::class);
        Unidade::observe(UnidadeObserver::class);
        Produto::observe(ProdutoObserver::class);
        Contato::observe(ContatoObserver::class);
        Role::observe(RoleObserver::class);
        Resource::observe(ResourceObserver::class);
    }
}
