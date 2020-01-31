<?php

namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cliente.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'tipo' => ['required', 'boolean'],
            'nome' => ['required', 'string'],
            'nascimento' => ['nullable', 'date'],
            'rg' => ['nullable', 'string'],
            'cpf' => ['nullable', 'string'],
            'insc_municipal' => ['nullable', 'string'],
            'cnpj' => ['nullable', 'string'],
            'sexo' => ['nullable'],
            'profissao' => ['nullable', 'string'],
            'local_trabalho' => ['nullable', 'string'],
            'telefone' => ['nullable', 'string'],
            'celular' => ['nullable', 'string'],
            'logradouro' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'cidade' => ['nullable'],
            'uf' => ['nullable'],
            'email' => ['nullable', 'email', 'string'],
            'observacao' => ['nullable', 'string'],
            'cep' => ['nullable', 'string'],
            'celular2' => ['nullable', 'string'],
            'celular3' => ['nullable', 'string'],
            'civil' => ['nullable'],
            'empresa' => ['nullable'],
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

    public function getEstadoCivilId()
    {
        if ($this->has('civil')) {
            return $this->get('civil')['id'];
        }
        return null;
    }

    public function getClienteResponsavelId()
    {
        if ($this->has('empresa')) {
            return $this->get('empresa')['id'];
        }
        return null;
    }

    public function getUfId()
    {
        if ($this->has('uf')) {
            return $this->get('uf')['id'];
        }
        return null;
    }

    public function getSexoId()
    {
        if ($this->has('sexo')) {
            return $this->get('sexo')['id'];
        }
        return null;
    }

    public function getCidadeId()
    {
        if ($this->has('cidade')) {
            return $this->get('cidade')['id'];
        }
        return null;
    }
}
