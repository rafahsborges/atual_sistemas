<?php

namespace App\Models;

use App\Models\Traits\SoftDeletesWithDeleted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use SoftDeletesWithDeleted;

    protected $fillable = [
        'tipo',
        'nome',
        'nascimento',
        'rg',
        'cpf',
        'insc_municipal',
        'cnpj',
        'id_sexo',
        'profissao',
        'local_trabalho',
        'telefone',
        'celular',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'id_cidade',
        'id_uf',
        'email',
        'observacao',
        'cep',
        'celular2',
        'celular3',
        'id_cliente_responsavel',
        'id_estado_civil',
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
        return url('/admin/clientes/'.$this->getKey());
    }

    /**
     * @return BelongsTo
     */
    public function civil()
    {
        return $this->belongsTo('App\Models\EstadoCivil', 'id_estado_civil');
    }

    /**
     * @return BelongsTo
     */
    public function sexo()
    {
        return $this->belongsTo('App\Models\Sexo', 'id_sexo');
    }

    /**
     * @return BelongsTo
     */
    public function uf()
    {
        return $this->belongsTo('App\Models\Uf', 'id_uf');
    }

    /**
     * @return BelongsTo
     */
    public function cidade()
    {
        return $this->belongsTo('App\Models\Cidade', 'id_cidade');
    }

    /**
     * @return HasMany
     */
    public function contratos()
    {
        return $this->hasMany('App\Models\Contrato', 'id_cliente');
    }

    /**
     * @return HasMany
     */
    public function dependentes()
    {
        return $this->hasMany('App\Models\Dependente', 'id_cliente');
    }
}
