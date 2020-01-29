<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
