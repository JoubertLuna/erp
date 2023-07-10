<?php

namespace App\Providers;

use App\Models\ERP\Painel\{
    Categoria,
    Resource,
    Role,
    Unidade
};

use App\Observers\ERP\Painel\{
    CategoriaObserver,
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
        Role::observe(RoleObserver::class);
        Resource::observe(ResourceObserver::class);
    }
}
