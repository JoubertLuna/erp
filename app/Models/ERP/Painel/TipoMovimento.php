<?php

namespace App\Models\ERP\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimento extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_movimento', 'url', 'ent_sai', 'movimenta_estoque'];
}
