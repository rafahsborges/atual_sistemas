<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $id_conta
 * @property string $data
 * @property float $id_usuario
 * @property string $nome
 * @property float $sequencia
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Conta $conta
 * @property RemessaBoleto[] $remessaBoletos
 */
class Remessa extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'remessa';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_conta', 'data', 'id_usuario', 'nome', 'sequencia', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function conta()
    {
        return $this->belongsTo('App\Conta', 'id_conta');
    }

    /**
     * @return HasMany
     */
    public function remessaBoletos()
    {
        return $this->hasMany('App\RemessaBoleto', 'id_remessa');
    }
}
