<?php

namespace App\Http\Requests\Admin\Conta;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateConta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.conta.edit', $this->contum);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['sometimes', 'string'],
            'banco' => ['sometimes', 'string'],
            'agencia' => ['sometimes', 'numeric'],
            'digito_agencia' => ['sometimes', 'string'],
            'conta' => ['sometimes', 'numeric'],
            'digito_conta' => ['sometimes', 'string'],
            'codigo_empresa' => ['sometimes', 'string'],
            'carteira' => ['sometimes', 'numeric'],
            'tipo' => ['sometimes', 'numeric'],
            'mensagem_1' => ['nullable', 'string'],
            'mensagem_2' => ['nullable', 'string'],
            'cpf_cnpj' => ['nullable', 'string'],
            'enabled' => ['sometimes', 'boolean'],

        ];
    }

    /**
     * Modify input data.
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
