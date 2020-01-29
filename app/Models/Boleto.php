<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boleto extends Model
{
    protected $fillable = [
        'status',
        'id_contrato_parcela',
    
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
}
