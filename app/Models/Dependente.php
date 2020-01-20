<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependente extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nome',
        'nascimento',
        'id_cliente',
        'id_parentesco',
        'enabled',
    ];


    protected $dates = [
        'nascimento',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/dependentes/'.$this->getKey());
    }
}
