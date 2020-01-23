<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContratoParcela extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'vencimento',
        'pagamento',
        'id_boleto',
        'id_carne',
        'valor',
        'numero_parcela',
        'valor_pagamento',
        'id_contrato',
        'enabled',
    ];


    protected $dates = [
        'vencimento',
        'pagamento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/contrato-parcelas/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function contrato()
    {
        return $this->belongsTo('App\Models\Contrato', 'id_contrato');
    }

    /**
     * @return HasMany
     */
    public function boletos()
    {
        return $this->hasMany('App\Models\Boleto', 'id_contrato_parcela');
    }
}
