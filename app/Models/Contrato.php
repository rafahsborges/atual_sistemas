<?php

namespace App\Models;

use App\Models\Traits\SoftDeletesWithDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contrato extends Model
{
    use SoftDeletesWithDeleted;

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
        return $this->belongsTo('App\Models\Cliente', 'id_cliente');
    }

    /**
     * @return BelongsTo
     */
    public function conta()
    {
        return $this->belongsTo('App\Models\Conta', 'id_conta');
    }

    /**
     * @return BelongsTo
     */
    public function plano()
    {
        return $this->belongsTo('App\Models\Plano', 'id_plano');
    }

    /**
     * @return HasMany
     */
    public function contratoParcelas()
    {
        return $this->hasMany('App\Models\ContratoParcela', 'id_contrato');
    }
}
