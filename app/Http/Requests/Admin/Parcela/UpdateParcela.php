<?php

namespace App\Http\Requests\Admin\Parcela;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateParcela extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.parcela.edit', $this->parcela);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'vencimento' => ['sometimes', 'date'],
            'pagamento' => ['nullable', 'date'],
            'id_boleto' => ['nullable', 'numeric'],
            'id_carne' => ['nullable', 'numeric'],
            'valor' => ['sometimes', 'numeric'],
            'numero_parcela' => ['nullable', 'numeric'],
            'valor_pagamento' => ['nullable', 'numeric'],
            'id_contrato' => ['nullable'],
            'enabled' => ['sometimes', 'boolean'],
            'contrato' => ['nullable'],
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

    public function getContratoId(){
        if ($this->has('contrato')){
            return $this->get('contrato')['id'];
        }
        return null;
    }
}
