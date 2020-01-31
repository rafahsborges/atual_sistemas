<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RemessaBoleto extends Model
{
    protected $fillable = [
        'id_boleto',
        'id_remessa',
    ];

    protected $dates = [

    ];

    public $timestamps = false;

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/remessa-boletos/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function boleto()
    {
        return $this->belongsTo('App\Models\Boleto', 'id_boleto');
    }

    /**
     * @return BelongsTo
     */
    public function remessa()
    {
        return $this->belongsTo('App\Models\Remessa', 'id_remessa');
    }
}
