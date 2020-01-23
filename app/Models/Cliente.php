<?php

namespace App\Models;

use App\Models\Traits\SoftDeletesWithDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use SoftDeletesWithDeleted;

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

    /**
     * @return BelongsTo
     */
    public function estadoCivil()
    {
        return $this->belongsTo('App\Models\EstadoCivil', 'id_estado_civil');
    }

    /**
     * @return HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'id_cliente');
    }

    /**
     * @return HasMany
     */
    public function dependentes()
    {
        return $this->hasMany('App\Models\Dependente', 'id_cliente');
    }
}
