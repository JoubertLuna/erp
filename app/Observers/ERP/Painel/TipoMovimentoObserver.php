<?php

namespace App\Observers\ERP\Painel;

use App\Models\ERP\Painel\TipoMovimento;
use Illuminate\Support\Str;

class TipoMovimentoObserver
{
    /**
     * Handle the TipoMovimento "creating" event.
     */
    public function creating(TipoMovimento $tipoMovimento): void
    {
        $tipoMovimento->url = Str::kebab($tipoMovimento->tipo_movimento);
    }

    /**
     * Handle the TipoMovimento "updating" event.
     */
    public function updating(TipoMovimento $tipoMovimento): void
    {
        $tipoMovimento->url = Str::kebab($tipoMovimento->tipo_movimento);
    }
}
