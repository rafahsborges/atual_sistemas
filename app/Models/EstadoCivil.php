<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoCivil extends Model
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
        return url('/admin/estado-civils/' . $this->getKey());
    }

    /**
     * @return HasMany
     */
    public function clientes()
    {
        return $this->hasMany('App\Models\Cliente', 'id_estado_civil');
    }
}
