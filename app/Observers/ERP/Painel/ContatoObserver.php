<?php

namespace App\Observers\ERP\Painel;

use App\Models\ERP\Painel\Contato;
use Illuminate\Support\Str;

class ContatoObserver
{
    /**
     * Handle the Contato "creating" event.
     */
    public function creating(Contato $contato): void
    {
        $contato->url = Str::kebab($contato->nome);
    }

    /**
     * Handle the Contato "updating" event.
     */
    public function updating(Contato $contato): void
    {
        $contato->url = Str::kebab($contato->nome);
    }
}
