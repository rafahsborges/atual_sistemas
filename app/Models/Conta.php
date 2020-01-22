<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'banco',
        'agencia',
        'digito_agencia',
        'conta',
        'digito_conta',
        'codigo_empresa',
        'carteira',
        'tipo',
        'mensagem_1',
        'mensagem_2',
        'cpf_cnpj',
        'enabled',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/contas/' . $this->getKey());
    }

    /**
     * @return HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Contrato', 'id_conta');
    }

    /**
     * @return HasMany
     */
    public function remessas()
    {
        return $this->hasMany('App\Remessa', 'id_conta');
    }
}
