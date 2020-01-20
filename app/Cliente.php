<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property integer $id
 * @property integer $id_estado_civil
 * @property boolean $tipo
 * @property string $nome
 * @property string $nascimento
 * @property string $rg
 * @property string $cpf
 * @property string $insc_municipal
 * @property string $cnpj
 * @property string $sexo
 * @property string $profissao
 * @property string $local_trabalho
 * @property string $telefone
 * @property string $celular
 * @property string $logradouro
 * @property string $numero
 * @property string $complemento
 * @property string $bairro
 * @property string $cidade
 * @property string $uf
 * @property string $email
 * @property string $observacao
 * @property string $cep
 * @property string $celular2
 * @property string $celular3
 * @property int $id_cliente_responsavel
 * @property boolean $enabled
 * @property string $created_at
 * @property string $updated_at
 * @property string $deleted_at
 * @property EstadoCivil $estadoCivil
 * @property Contrato[] $contratos
 * @property Dependente[] $dependentes
 */
class Cliente extends Model
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
    protected $fillable = ['id_estado_civil', 'tipo', 'nome', 'nascimento', 'rg', 'cpf', 'insc_municipal', 'cnpj', 'sexo', 'profissao', 'local_trabalho', 'telefone', 'celular', 'logradouro', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'email', 'observacao', 'cep', 'celular2', 'celular3', 'id_cliente_responsavel', 'enabled', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @return BelongsTo
     */
    public function estadoCivil()
    {
        return $this->belongsTo('App\EstadoCivil', 'id_estado_civil');
    }

    /**
     * @return HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Contrato', 'id_cliente');
    }

    /**
     * @return HasMany
     */
    public function dependentes()
    {
        return $this->hasMany('App\Dependente', 'id_cliente');
    }
}
