<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'tipo',
        'nome',
        'nascimento',
        'rg',
        'cpf',
        'insc_municipal',
        'cnpj',
        'sexo',
        'profissao',
        'local_trabalho',
        'telefone',
        'celular',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'email',
        'observacao',
        'cep',
        'celular2',
        'celular3',
        'id_cliente_responsavel',
        'id_estado_civil',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'nascimento',
        'created_at',
        'updated_at',
        'deleted_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/clientes/'.$this->getKey());
    }
}
