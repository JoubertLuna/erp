<?php

namespace App\Http\Requests\ERP\Painel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TipoMovimentoRequest extends FormRequest
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
            'tipo_movimento' => "required|min:3|max:255|unique:tipo_movimentos,tipo_movimento,{$url},url",
            'ent_sai' => 'required', Rule::in(['E', 'S']),
            'movimenta_estoque' => 'required', Rule::in(['S', 'N']),
        ];
    }
}
