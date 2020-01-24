<?php

namespace App\Models;

use App\Models\Traits\SoftDeletesWithDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dependente extends Model
{
    use SoftDeletesWithDeleted;

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

    /**
     * @return BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente', 'id_cliente' , 'id');
    }

    /**
     * @return BelongsTo
     */
    public function parentesco()
    {
        return $this->belongsTo('App\Models\Parentesco', 'id_parentesco', 'id');
    }
}
