<?php

namespace App\Observers\ERP\Painel;

use App\Models\ERP\Painel\Localizacao;
use Illuminate\Support\Str;

class LocalizacaoObserver
{
    /**
     * Handle the Localizacao "creating" event.
     */
    public function creating(Localizacao $localizacao): void
    {
        $localizacao->url = Str::kebab($localizacao->localizacao);
    }

    /**
     * Handle the Localizacao "updating" event.
     */
    public function updating(Localizacao $localizacao): void
    {
        $localizacao->url = Str::kebab($localizacao->localizacao);
    }
}
