<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Remessa extends Model
{
    protected $fillable = [
        'data',
        'id_usuario',
        'nome',
        'sequencia',
        'id_conta',
    ];

    protected $dates = [
        'data',
    ];

    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/remessas/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function conta()
    {
        return $this->belongsTo('App\Models\Conta', 'id_conta');
    }

    /**
     * @return HasMany
     */
    public function remessaBoletos()
    {
        return $this->hasMany('App\Models\RemessaBoleto', 'id_remessa');
    }
}
