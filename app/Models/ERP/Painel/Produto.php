<?php

namespace App\Models\ERP\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = ['produto', 'url', 'eh_produto', 'eh_insumo', 'preco', 'image', 'ativo', 'unidade_id', 'categoria_id'];

    #Relecionamentos
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    #Relecionamentos
    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
