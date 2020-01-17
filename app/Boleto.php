<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $id_contrato_parcela
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property ContratoParcela $contratoParcela
 * @property RemessaBoleto[] $remessaBoletos
 */
class Boleto extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'boleto';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_contrato_parcela', 'status', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function contratoParcela()
    {
        return $this->belongsTo('App\ContratoParcela', 'id_contrato_parcela');
    }

    /**
     * @return HasMany
     */
    public function remessaBoletos()
    {
        return $this->hasMany('App\RemessaBoleto', 'id_boleto');
    }
}
