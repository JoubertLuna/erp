<?php

namespace App\Http\Requests\ERP\Painel;

use Illuminate\Foundation\Http\FormRequest;

class LocalizacaoRequest extends FormRequest
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
            'localizacao' => "required|min:3|max:255|unique:localizacaos,localizacao,{$url},url",
            'rua' => "required|string|min:3|max:255",
        ];
    }
}
