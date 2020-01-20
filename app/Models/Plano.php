<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $nome
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Contrato[] $contratos
 */
class Plano extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['nome', 'enabled', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Contrato', 'id_plano');
    }
}
