<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cliente';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    protected $fillable = [
        'tipo',
        'nome',
        'nascimento',
        'rg',
        'cpf',
        'insc_municipal',
        'cnpj',
        'sexo',
        'id_estado_civil',
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
