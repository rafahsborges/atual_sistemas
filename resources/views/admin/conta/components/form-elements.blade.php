<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cpf_cnpj'), 'has-success': fields.cpf_cnpj && fields.cpf_cnpj.valid }">
    <label for="cpf_cnpj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.cpf_cnpj') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-mask="['###.###.###-##', '##.###.###/####-##']" v-model="form.cpf_cnpj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cpf_cnpj'), 'form-control-success': fields.cpf_cnpj && fields.cpf_cnpj.valid}" id="cpf_cnpj" name="cpf_cnpj" placeholder="{{ trans('admin.conta.columns.cpf_cnpj') }}">
        <div v-if="errors.has('cpf_cnpj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cpf_cnpj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.conta.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('banco'), 'has-success': fields.banco && fields.banco.valid }">
    <label for="banco" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.banco') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.banco" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('banco'), 'form-control-success': fields.banco && fields.banco.valid}" id="banco" name="banco" placeholder="{{ trans('admin.conta.columns.banco') }}">
        <div v-if="errors.has('banco')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('banco') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('agencia'), 'has-success': fields.agencia && fields.agencia.valid }">
    <label for="agencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.agencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.agencia" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('agencia'), 'form-control-success': fields.agencia && fields.agencia.valid}" id="agencia" name="agencia" placeholder="{{ trans('admin.conta.columns.agencia') }}">
        <div v-if="errors.has('agencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('agencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('digito_agencia'), 'has-success': fields.digito_agencia && fields.digito_agencia.valid }">
    <label for="digito_agencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.digito_agencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.digito_agencia" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('digito_agencia'), 'form-control-success': fields.digito_agencia && fields.digito_agencia.valid}" id="digito_agencia" name="digito_agencia" placeholder="{{ trans('admin.conta.columns.digito_agencia') }}">
        <div v-if="errors.has('digito_agencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('digito_agencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('conta'), 'has-success': fields.conta && fields.conta.valid }">
    <label for="conta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.conta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.conta" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('conta'), 'form-control-success': fields.conta && fields.conta.valid}" id="conta" name="conta" placeholder="{{ trans('admin.conta.columns.conta') }}">
        <div v-if="errors.has('conta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('conta') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('digito_conta'), 'has-success': fields.digito_conta && fields.digito_conta.valid }">
    <label for="digito_conta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.digito_conta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.digito_conta" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('digito_conta'), 'form-control-success': fields.digito_conta && fields.digito_conta.valid}" id="digito_conta" name="digito_conta" placeholder="{{ trans('admin.conta.columns.digito_conta') }}">
        <div v-if="errors.has('digito_conta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('digito_conta') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('codigo_empresa'), 'has-success': fields.codigo_empresa && fields.codigo_empresa.valid }">
    <label for="codigo_empresa" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.codigo_empresa') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.codigo_empresa" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('codigo_empresa'), 'form-control-success': fields.codigo_empresa && fields.codigo_empresa.valid}" id="codigo_empresa" name="codigo_empresa" placeholder="{{ trans('admin.conta.columns.codigo_empresa') }}">
        <div v-if="errors.has('codigo_empresa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('codigo_empresa') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('carteira'), 'has-success': fields.carteira && fields.carteira.valid }">
    <label for="carteira" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.carteira') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.carteira" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('carteira'), 'form-control-success': fields.carteira && fields.carteira.valid}" id="carteira" name="carteira" placeholder="{{ trans('admin.conta.columns.carteira') }}">
        <div v-if="errors.has('carteira')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('carteira') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo'), 'has-success': fields.tipo && fields.tipo.valid }">
    <label for="tipo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.tipo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tipo" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo'), 'form-control-success': fields.tipo && fields.tipo.valid}" id="tipo" name="tipo" placeholder="{{ trans('admin.conta.columns.tipo') }}">
        <div v-if="errors.has('tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mensagem_1'), 'has-success': fields.mensagem_1 && fields.mensagem_1.valid }">
    <label for="mensagem_1" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.mensagem_1') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mensagem_1" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mensagem_1'), 'form-control-success': fields.mensagem_1 && fields.mensagem_1.valid}" id="mensagem_1" name="mensagem_1" placeholder="{{ trans('admin.conta.columns.mensagem_1') }}">
        <div v-if="errors.has('mensagem_1')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mensagem_1') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('mensagem_2'), 'has-success': fields.mensagem_2 && fields.mensagem_2.valid }">
    <label for="mensagem_2" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.conta.columns.mensagem_2') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.mensagem_2" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('mensagem_2'), 'form-control-success': fields.mensagem_2 && fields.mensagem_2.valid}" id="mensagem_2" name="mensagem_2" placeholder="{{ trans('admin.conta.columns.mensagem_2') }}">
        <div v-if="errors.has('mensagem_2')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('mensagem_2') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.conta.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


