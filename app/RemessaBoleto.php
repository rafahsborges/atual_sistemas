<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property integer $id_boleto
 * @property integer $id_remessa
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Boleto $boleto
 * @property Remessa $remessa
 */
class RemessaBoleto extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'remessa_boleto';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_boleto', 'id_remessa', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function boleto()
    {
        return $this->belongsTo('App\Boleto', 'id_boleto');
    }

    /**
     * @return BelongsTo
     */
    public function remessa()
    {
        return $this->belongsTo('App\Remessa', 'id_remessa');
    }
}
