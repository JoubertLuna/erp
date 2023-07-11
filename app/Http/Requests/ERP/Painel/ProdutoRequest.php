<?php

namespace App\Http\Requests\ERP\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProdutoRequest extends FormRequest
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
            'produto' => "required|min:3|max:255|unique:produtos,produto,{$url},url",
            'eh_produto' => 'required', Rule::in(['1', '0']),
            'eh_insumo' => 'required', Rule::in(['1', '0']),
            'preco' => "required|numeric|regex:/^\d+(\.\d{1,2})?$/",
            'image' => 'nullable|max:2048|',
            'ativo' => 'required', Rule::in(['1', '0']),
            'categoria_id' => ['exists:categorias,id'],
            'unidade_id' => ['exists:unidades,id'],
        ];
    }

    public function validationData()
    {
        $dados = $this->all();

        $dados['preco'] = $this->formataValorMonetario($dados['preco']);

        $this->replace($dados);
        return $dados;
    }

    /**
     * formatação dos valores monetários
     */
    protected function formataValorMonetario(string $valor)
    {
        return str_replace(['.', ','], ['', '.'], $valor);
    }
}
