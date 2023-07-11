<?php

namespace App\Models\ERP\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = ['unidade', 'url'];

    #Relecionamentos
    public function produtos()
    {
        return $this->hasMany(Produto::class);
    }
}
