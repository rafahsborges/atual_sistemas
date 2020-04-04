<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Boleto extends Model
{
    protected $fillable = [
        'status',
        'id_parcela',
    ];

    protected $dates = [

    ];
    
    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/boletos/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function parcela()
    {
        return $this->belongsTo('App\Models\Parcela', 'id_parcela');
    }

    /**
     * @return HasMany
     */
    public function remessaBoletos()
    {
        return $this->hasMany('App\Models\RemessaBoleto', 'id_boleto');
    }
}
