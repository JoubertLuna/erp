<?php

namespace App\Providers;

use App\Models\ERP\Painel\{
    Categoria,
    Contato,
    Localizacao,
    Produto,
    Resource,
    Role,
    TipoMovimento,
    Unidade
};

use App\Observers\ERP\Painel\{
    CategoriaObserver,
    ContatoObserver,
    LocalizacaoObserver,
    ProdutoObserver,
    ResourceObserver,
    RoleObserver,
    TipoMovimentoObserver,
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
        //Cadastro
        Categoria::observe(CategoriaObserver::class);
        Unidade::observe(UnidadeObserver::class);
        Produto::observe(ProdutoObserver::class);
        Contato::observe(ContatoObserver::class);

        //Estoque
        TipoMovimento::observe(TipoMovimentoObserver::class);
        Localizacao::observe(LocalizacaoObserver::class);

        //Config
        Role::observe(RoleObserver::class);
        Resource::observe(ResourceObserver::class);
    }
}
