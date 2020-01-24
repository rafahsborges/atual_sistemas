<?php

namespace App\Http\Requests\Admin\Cliente;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        //return Gate::allows('admin.cliente.index');
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:id,tipo,nome,nascimento,rg,cpf,insc_municipal,cnpj,sexo,profissao,local_trabalho,telefone,celular,logradouro,numero,complemento,bairro,cidade,uf,email,observacao,cep,celular2,celular3,id_cliente_responsavel,id_estado_civil,enabled|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',
        ];
    }
}
