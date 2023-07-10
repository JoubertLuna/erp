<?php

namespace App\Observers\ERP\Painel;

use App\Models\ERP\Painel\Categoria;
use Illuminate\Support\Str;

class CategoriaObserver
{
    /**
     * Handle the Categoria "creating" event.
     */
    public function creating(Categoria $categoria): void
    {
        $categoria->url = Str::kebab($categoria->categoria);
    }

    /**
     * Handle the Categoria "updating" event.
     */
    public function updating(Categoria $categoria): void
    {
        $categoria->url = Str::kebab($categoria->categoria);
    }
}
