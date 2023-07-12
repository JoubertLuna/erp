<?php

namespace App\Models\ERP\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localizacao extends Model
{
    use HasFactory;

    protected $fillable = ['localizacao', 'url', 'rua'];
}
