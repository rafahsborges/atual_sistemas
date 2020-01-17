<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property string $descricao
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Cliente[] $clientes
 */
class EstadoCivil extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'estado_civil';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['descricao', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return HasMany
     */
    public function clientes()
    {
        return $this->hasMany('App\Cliente', 'id_estado_civil');
    }
}
