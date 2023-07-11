<?php

namespace App\Models\ERP\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = ['eh_cliente', 'nome', 'url', 'nome_fantasia', 'cpf', 'rg', 'cnpj', 'ativo', 'fone', 'celular', 'email', 'cep', 'logradouro', 'numero', 'bairro', 'cidade', 'uf', 'complemento'];
}
