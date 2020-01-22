<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'primeira_parcela',
        'ultima_parcela',
        'data_assinatura',
        'qtd_parcelas',
        'tipo_pagamento',
        'valor',
        'plano_funeral',
        'desconto',
        'juros',
        'multa',
        'validade_contrato',
        'id_cliente',
        'id_plano',
        'id_conta',
        'enabled',
    ];


    protected $dates = [
        'primeira_parcela',
        'ultima_parcela',
        'data_assinatura',
        'validade_contrato',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/contratos/' . $this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    /**
     * @return BelongsTo
     */
    public function conta()
    {
        return $this->belongsTo('App\Conta', 'id_conta');
    }

    /**
     * @return BelongsTo
     */
    public function plano()
    {
        return $this->belongsTo('App\Plano', 'id_plano');
    }

    /**
     * @return HasMany
     */
    public function contratoParcelas()
    {
        return $this->hasMany('App\ContratoParcela', 'id_contrato');
    }
}
