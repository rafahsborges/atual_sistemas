<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property integer $id
 * @property integer $id_cliente
 * @property string $nome
 * @property string $nascimento
 * @property integer $id_parentesco
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property Cliente $cliente
 * @property Parentesco $parentesco
 */
class Dependente extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dependente';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['id_cliente', 'nome', 'nascimento', 'id_parentesco', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'id_cliente');
    }

    /**
     * @return BelongsTo
     */
    public function parentesco()
    {
        return $this->belongsTo('App\Parentesco', 'id_cliente');
    }
}
