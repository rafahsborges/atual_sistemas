<div class="form-check row" :class="{'has-danger': errors.has('tipo'), 'has-success': fields.tipo && fields.tipo.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="tipo" type="checkbox" v-model="form.tipo" v-validate="''" data-vv-name="tipo"  name="tipo_fake_element">
        <label class="form-check-label" for="tipo">
            {{ trans('admin.cliente.columns.tipo') }}
        </label>
        <input type="hidden" name="tipo" :value="form.tipo">
        <div v-if="errors.has('tipo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('logradouro'), 'has-success': fields.logradouro && fields.logradouro.valid }">
    <label for="logradouro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.logradouro') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.logradouro" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('logradouro'), 'form-control-success': fields.logradouro && fields.logradouro.valid}" id="logradouro" name="logradouro" placeholder="{{ trans('admin.cliente.columns.logradouro') }}">
        <div v-if="errors.has('logradouro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('logradouro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('celular3'), 'has-success': fields.celular3 && fields.celular3.valid }">
    <label for="celular3" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.celular3') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.celular3" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('celular3'), 'form-control-success': fields.celular3 && fields.celular3.valid}" id="celular3" name="celular3" placeholder="{{ trans('admin.cliente.columns.celular3') }}">
        <div v-if="errors.has('celular3')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular3') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('celular2'), 'has-success': fields.celular2 && fields.celular2.valid }">
    <label for="celular2" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.celular2') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.celular2" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('celular2'), 'form-control-success': fields.celular2 && fields.celular2.valid}" id="celular2" name="celular2" placeholder="{{ trans('admin.cliente.columns.celular2') }}">
        <div v-if="errors.has('celular2')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular2') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cep'), 'has-success': fields.cep && fields.cep.valid }">
    <label for="cep" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cep') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cep" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cep'), 'form-control-success': fields.cep && fields.cep.valid}" id="cep" name="cep" placeholder="{{ trans('admin.cliente.columns.cep') }}">
        <div v-if="errors.has('cep')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cep') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('observacao'), 'has-success': fields.observacao && fields.observacao.valid }">
    <label for="observacao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.observacao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.observacao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('observacao'), 'form-control-success': fields.observacao && fields.observacao.valid}" id="observacao" name="observacao" placeholder="{{ trans('admin.cliente.columns.observacao') }}">
        <div v-if="errors.has('observacao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('observacao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.cliente.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('uf'), 'has-success': fields.uf && fields.uf.valid }">
    <label for="uf" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.uf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.uf" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('uf'), 'form-control-success': fields.uf && fields.uf.valid}" id="uf" name="uf" placeholder="{{ trans('admin.cliente.columns.uf') }}">
        <div v-if="errors.has('uf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('uf') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cidade'), 'has-success': fields.cidade && fields.cidade.valid }">
    <label for="cidade" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cidade') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cidade" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cidade'), 'form-control-success': fields.cidade && fields.cidade.valid}" id="cidade" name="cidade" placeholder="{{ trans('admin.cliente.columns.cidade') }}">
        <div v-if="errors.has('cidade')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cidade') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('bairro'), 'has-success': fields.bairro && fields.bairro.valid }">
    <label for="bairro" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.bairro') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.bairro" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('bairro'), 'form-control-success': fields.bairro && fields.bairro.valid}" id="bairro" name="bairro" placeholder="{{ trans('admin.cliente.columns.bairro') }}">
        <div v-if="errors.has('bairro')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('bairro') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('complemento'), 'has-success': fields.complemento && fields.complemento.valid }">
    <label for="complemento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.complemento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.complemento" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('complemento'), 'form-control-success': fields.complemento && fields.complemento.valid}" id="complemento" name="complemento" placeholder="{{ trans('admin.cliente.columns.complemento') }}">
        <div v-if="errors.has('complemento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('complemento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numero'), 'has-success': fields.numero && fields.numero.valid }">
    <label for="numero" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.numero') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numero" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numero'), 'form-control-success': fields.numero && fields.numero.valid}" id="numero" name="numero" placeholder="{{ trans('admin.cliente.columns.numero') }}">
        <div v-if="errors.has('numero')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('celular'), 'has-success': fields.celular && fields.celular.valid }">
    <label for="celular" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.celular') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.celular" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('celular'), 'form-control-success': fields.celular && fields.celular.valid}" id="celular" name="celular" placeholder="{{ trans('admin.cliente.columns.celular') }}">
        <div v-if="errors.has('celular')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('celular') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.cliente.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefone'), 'has-success': fields.telefone && fields.telefone.valid }">
    <label for="telefone" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.telefone') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefone" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefone'), 'form-control-success': fields.telefone && fields.telefone.valid}" id="telefone" name="telefone" placeholder="{{ trans('admin.cliente.columns.telefone') }}">
        <div v-if="errors.has('telefone')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefone') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('local_trabalho'), 'has-success': fields.local_trabalho && fields.local_trabalho.valid }">
    <label for="local_trabalho" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.local_trabalho') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.local_trabalho" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('local_trabalho'), 'form-control-success': fields.local_trabalho && fields.local_trabalho.valid}" id="local_trabalho" name="local_trabalho" placeholder="{{ trans('admin.cliente.columns.local_trabalho') }}">
        <div v-if="errors.has('local_trabalho')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('local_trabalho') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('profissao'), 'has-success': fields.profissao && fields.profissao.valid }">
    <label for="profissao" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.profissao') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.profissao" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('profissao'), 'form-control-success': fields.profissao && fields.profissao.valid}" id="profissao" name="profissao" placeholder="{{ trans('admin.cliente.columns.profissao') }}">
        <div v-if="errors.has('profissao')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('profissao') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_estado_civil'), 'has-success': fields.id_estado_civil && fields.id_estado_civil.valid }">
    <label for="id_estado_civil" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.id_estado_civil') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_estado_civil" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_estado_civil'), 'form-control-success': fields.id_estado_civil && fields.id_estado_civil.valid}" id="id_estado_civil" name="id_estado_civil" placeholder="{{ trans('admin.cliente.columns.id_estado_civil') }}">
        <div v-if="errors.has('id_estado_civil')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_estado_civil') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sexo'), 'has-success': fields.sexo && fields.sexo.valid }">
    <label for="sexo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.sexo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sexo" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sexo'), 'form-control-success': fields.sexo && fields.sexo.valid}" id="sexo" name="sexo" placeholder="{{ trans('admin.cliente.columns.sexo') }}">
        <div v-if="errors.has('sexo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sexo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cnpj'), 'has-success': fields.cnpj && fields.cnpj.valid }">
    <label for="cnpj" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cnpj') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cnpj" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cnpj'), 'form-control-success': fields.cnpj && fields.cnpj.valid}" id="cnpj" name="cnpj" placeholder="{{ trans('admin.cliente.columns.cnpj') }}">
        <div v-if="errors.has('cnpj')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cnpj') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('insc_municipal'), 'has-success': fields.insc_municipal && fields.insc_municipal.valid }">
    <label for="insc_municipal" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.insc_municipal') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.insc_municipal" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('insc_municipal'), 'form-control-success': fields.insc_municipal && fields.insc_municipal.valid}" id="insc_municipal" name="insc_municipal" placeholder="{{ trans('admin.cliente.columns.insc_municipal') }}">
        <div v-if="errors.has('insc_municipal')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('insc_municipal') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cpf'), 'has-success': fields.cpf && fields.cpf.valid }">
    <label for="cpf" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.cpf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cpf" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cpf'), 'form-control-success': fields.cpf && fields.cpf.valid}" id="cpf" name="cpf" placeholder="{{ trans('admin.cliente.columns.cpf') }}">
        <div v-if="errors.has('cpf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cpf') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('rg'), 'has-success': fields.rg && fields.rg.valid }">
    <label for="rg" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.rg') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.rg" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('rg'), 'form-control-success': fields.rg && fields.rg.valid}" id="rg" name="rg" placeholder="{{ trans('admin.cliente.columns.rg') }}">
        <div v-if="errors.has('rg')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('rg') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nascimento'), 'has-success': fields.nascimento && fields.nascimento.valid }">
    <label for="nascimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.nascimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.nascimento" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('nascimento'), 'form-control-success': fields.nascimento && fields.nascimento.valid}" id="nascimento" name="nascimento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('nascimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nascimento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_cliente_responsavel'), 'has-success': fields.id_cliente_responsavel && fields.id_cliente_responsavel.valid }">
    <label for="id_cliente_responsavel" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cliente.columns.id_cliente_responsavel') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_cliente_responsavel" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_cliente_responsavel'), 'form-control-success': fields.id_cliente_responsavel && fields.id_cliente_responsavel.valid}" id="id_cliente_responsavel" name="id_cliente_responsavel" placeholder="{{ trans('admin.cliente.columns.id_cliente_responsavel') }}">
        <div v-if="errors.has('id_cliente_responsavel')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_cliente_responsavel') }}</div>
    </div>
</div>


