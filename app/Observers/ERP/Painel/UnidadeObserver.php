<?php

namespace App\Observers\ERP\Painel;

use App\Models\ERP\Painel\Unidade;
use Illuminate\Support\Str;

class UnidadeObserver
{
    /**
     * Handle the Unidade "creating" event.
     */
    public function creating(Unidade $unidade): void
    {
        $unidade->url = Str::kebab($unidade->unidade);
    }

    /**
     * Handle the Unidade "updating" event.
     */
    public function updating(Unidade $unidade): void
    {
        $unidade->url = Str::kebab($unidade->unidade);
    }
}
