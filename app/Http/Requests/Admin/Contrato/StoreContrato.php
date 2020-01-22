<?php

namespace App\Http\Requests\Admin\Contrato;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreContrato extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.contrato.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'primeira_parcela' => ['required', 'date'],
            'ultima_parcela' => ['required', 'date'],
            'data_assinatura' => ['required', 'date'],
            'qtd_parcelas' => ['nullable', 'numeric'],
            'tipo_pagamento' => ['required', 'numeric'],
            'valor' => ['required', 'numeric'],
            'plano_funeral' => ['nullable', 'boolean'],
            'desconto' => ['nullable', 'numeric'],
            'juros' => ['nullable', 'numeric'],
            'multa' => ['nullable', 'numeric'],
            'validade_contrato' => ['nullable', 'date'],
            'id_cliente' => ['nullable', 'string'],
            'id_plano' => ['nullable', 'string'],
            'id_conta' => ['nullable', 'string'],
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
