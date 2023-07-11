<?php

namespace App\Observers\ERP\Painel;

use App\Models\ERP\Painel\Produto;
use Illuminate\Support\Str;

class ProdutoObserver
{
    /**
     * Handle the Produto "creating" event.
     */
    public function creating(Produto $produto): void
    {
        $produto->url = Str::kebab($produto->produto);
    }

    /**
     * Handle the Produto "updating" event.
     */
    public function updating(Produto $produto): void
    {
        $produto->url = Str::kebab($produto->produto);
    }
}
