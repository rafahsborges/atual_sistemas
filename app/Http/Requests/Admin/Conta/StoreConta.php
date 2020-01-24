<?php

namespace App\Http\Requests\Admin\Conta;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreConta extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.conta.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => ['required', 'string'],
            'banco' => ['required', 'string'],
            'agencia' => ['required', 'numeric'],
            'digito_agencia' => ['required', 'string'],
            'conta' => ['required', 'numeric'],
            'digito_conta' => ['required', 'string'],
            'codigo_empresa' => ['required', 'string'],
            'carteira' => ['required', 'numeric'],
            'tipo' => ['required', 'numeric'],
            'mensagem_1' => ['nullable', 'string'],
            'mensagem_2' => ['nullable', 'string'],
            'cpf_cnpj' => ['nullable', 'string'],
            'enabled' => ['required', 'boolean'],
            
        ];
    }

    /**
    * Modify input data
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
