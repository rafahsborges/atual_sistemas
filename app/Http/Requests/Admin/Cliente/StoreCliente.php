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
            'sexo' => ['nullable', 'string'],
            'profissao' => ['nullable', 'string'],
            'local_trabalho' => ['nullable', 'string'],
            'telefone' => ['nullable', 'string'],
            'celular' => ['nullable', 'string'],
            'logradouro' => ['nullable', 'string'],
            'numero' => ['nullable', 'string'],
            'complemento' => ['nullable', 'string'],
            'bairro' => ['nullable', 'string'],
            'cidade' => ['nullable', 'string'],
            'uf' => ['nullable', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'observacao' => ['nullable', 'string'],
            'cep' => ['nullable', 'string'],
            'celular2' => ['nullable', 'string'],
            'celular3' => ['nullable', 'string'],
            'id_cliente_responsavel' => ['nullable', 'integer'],
            'id_estado_civil' => ['nullable', 'string'],
            'enabled' => ['required', 'boolean'],
            'civil' => ['required'],
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

    public function getEstadoCivilId(){
        if ($this->has('civil')){
            return $this->get('civil')['id'];
        }
        return null;
    }
}
