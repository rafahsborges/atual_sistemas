<?php

namespace App\Http\Requests\Admin\Contrato;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateContrato extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.contrato.edit', $this->contrato);
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
            'qtd_meses' => ['nullable', 'numeric'],
            'tipo_pagamento' => ['required'],
            'valor' => ['required'],
            'valor_parcela' => ['required'],
            'plano_funeral' => ['nullable', 'boolean'],
            'desconto' => ['nullable'],
            'juros' => ['nullable'],
            'multa' => ['nullable'],
            'validade_contrato' => ['nullable', 'date'],
            'enabled' => ['required', 'boolean'],
            'cliente' => ['nullable'],
            'conta' => ['nullable'],
            'plano' => ['nullable'],
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

    public function getClienteId()
    {
        if ($this->has('cliente')) {
            return $this->get('cliente')['id'];
        }
    }

    public function getContaId()
    {
        if ($this->has('conta')) {
            return $this->get('conta')['id'];
        }
    }

    public function getPlanoId()
    {
        if ($this->has('plano')) {
            return $this->get('plano')['id'];
        }
    }

    public function getTipoPagamentoId()
    {
        if ($this->has('tipo_pagamento')) {
            return $this->get('tipo_pagamento')['id'];
        }
    }

    public function keepOnlyDigits($string)
    {
        return preg_replace('/\D/', '', $string);
    }

    public function prepareCurrencies($string)
    {
        return str_replace(',', '.', str_replace('.', '', $string));
    }
}
