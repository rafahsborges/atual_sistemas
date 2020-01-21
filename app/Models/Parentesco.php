<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parentesco extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nome',
        'enabled',
    ];


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/parentescos/'.$this->getKey());
    }

    /**
     * @return HasMany
     */
    public function dependentes()
    {
        return $this->hasMany('App\Models\Dependente', 'id_parentesco');
    }
}
