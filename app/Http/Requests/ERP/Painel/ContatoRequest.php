<?php

namespace App\Http\Requests\ERP\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $url = $this->segment(2);

        return [
            'nome' => "required|min:3|max:255|unique:contatos,nome,{$url},url",
            'eh_cliente' => 'nullable', Rule::in(['1', '2', '3']),
            'nome_fantasia' => 'nullable|min:3|max:255|',
            'cpf' => "nullable|min:14|max:14|cpf|formato_cpf|unique:contatos,cpf,{$url},url",
            'rg' => "nullable|min:9|max:10|unique:contatos,rg,{$url},url",
            'cnpj' => "required|min:18|max:18|cnpj|formato_cnpj|unique:contatos,cnpj,{$url},url",
            'ativo' => 'required', Rule::in(['1', '0']),
            'fone' => 'nullable|min:14|max:14|celular_com_ddd|',
            'celular' => 'nullable|min:15|max:15|celular_com_ddd|',
            'email' => "required|string|email|min:3|max:255|unique:contatos,email,{$url},url",
            'cep' => 'nullable|min:9|max:10|',
            'logradouro' => 'nullable|max:200|',
            'numero' => 'nullable|numeric|',
            'bairro' => 'nullable|max:200|',
            'cidade' => 'nullable|max:200|',
            'uf' => 'nullable|min:2|max:2|uf|',
            'complemento' => 'nullable|max:200|',
        ];
    }
}
