<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
