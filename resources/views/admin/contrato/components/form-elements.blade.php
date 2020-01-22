<div class="form-group row align-items-center" :class="{'has-danger': errors.has('primeira_parcela'), 'has-success': fields.primeira_parcela && fields.primeira_parcela.valid }">
    <label for="primeira_parcela" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.primeira_parcela') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.primeira_parcela" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('primeira_parcela'), 'form-control-success': fields.primeira_parcela && fields.primeira_parcela.valid}" id="primeira_parcela" name="primeira_parcela" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('primeira_parcela')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('primeira_parcela') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ultima_parcela'), 'has-success': fields.ultima_parcela && fields.ultima_parcela.valid }">
    <label for="ultima_parcela" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.ultima_parcela') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.ultima_parcela" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('ultima_parcela'), 'form-control-success': fields.ultima_parcela && fields.ultima_parcela.valid}" id="ultima_parcela" name="ultima_parcela" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('ultima_parcela')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ultima_parcela') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data_assinatura'), 'has-success': fields.data_assinatura && fields.data_assinatura.valid }">
    <label for="data_assinatura" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.data_assinatura') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data_assinatura" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data_assinatura'), 'form-control-success': fields.data_assinatura && fields.data_assinatura.valid}" id="data_assinatura" name="data_assinatura" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('data_assinatura')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data_assinatura') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('qtd_parcelas'), 'has-success': fields.qtd_parcelas && fields.qtd_parcelas.valid }">
    <label for="qtd_parcelas" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.qtd_parcelas') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.qtd_parcelas" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('qtd_parcelas'), 'form-control-success': fields.qtd_parcelas && fields.qtd_parcelas.valid}" id="qtd_parcelas" name="qtd_parcelas" placeholder="{{ trans('admin.contrato.columns.qtd_parcelas') }}">
        <div v-if="errors.has('qtd_parcelas')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('qtd_parcelas') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('tipo_pagamento'), 'has-success': fields.tipo_pagamento && fields.tipo_pagamento.valid }">
    <label for="tipo_pagamento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.tipo_pagamento') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.tipo_pagamento" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('tipo_pagamento'), 'form-control-success': fields.tipo_pagamento && fields.tipo_pagamento.valid}" id="tipo_pagamento" name="tipo_pagamento" placeholder="{{ trans('admin.contrato.columns.tipo_pagamento') }}">
        <div v-if="errors.has('tipo_pagamento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('tipo_pagamento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
    <label for="valor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.valor') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}" id="valor" name="valor" placeholder="{{ trans('admin.contrato.columns.valor') }}">
        <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('plano_funeral'), 'has-success': fields.plano_funeral && fields.plano_funeral.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="plano_funeral" type="checkbox" v-model="form.plano_funeral" v-validate="''" data-vv-name="plano_funeral"  name="plano_funeral_fake_element">
        <label class="form-check-label" for="plano_funeral">
            {{ trans('admin.contrato.columns.plano_funeral') }}
        </label>
        <input type="hidden" name="plano_funeral" :value="form.plano_funeral">
        <div v-if="errors.has('plano_funeral')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('plano_funeral') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('desconto'), 'has-success': fields.desconto && fields.desconto.valid }">
    <label for="desconto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.desconto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.desconto" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('desconto'), 'form-control-success': fields.desconto && fields.desconto.valid}" id="desconto" name="desconto" placeholder="{{ trans('admin.contrato.columns.desconto') }}">
        <div v-if="errors.has('desconto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('desconto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('juros'), 'has-success': fields.juros && fields.juros.valid }">
    <label for="juros" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.juros') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.juros" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('juros'), 'form-control-success': fields.juros && fields.juros.valid}" id="juros" name="juros" placeholder="{{ trans('admin.contrato.columns.juros') }}">
        <div v-if="errors.has('juros')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('juros') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('multa'), 'has-success': fields.multa && fields.multa.valid }">
    <label for="multa" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.multa') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.multa" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('multa'), 'form-control-success': fields.multa && fields.multa.valid}" id="multa" name="multa" placeholder="{{ trans('admin.contrato.columns.multa') }}">
        <div v-if="errors.has('multa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('multa') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('validade_contrato'), 'has-success': fields.validade_contrato && fields.validade_contrato.valid }">
    <label for="validade_contrato" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.validade_contrato') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.validade_contrato" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('validade_contrato'), 'form-control-success': fields.validade_contrato && fields.validade_contrato.valid}" id="validade_contrato" name="validade_contrato" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('validade_contrato')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('validade_contrato') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
    <label for="id_cliente" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.id_cliente') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_cliente" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_cliente'), 'form-control-success': fields.id_cliente && fields.id_cliente.valid}" id="id_cliente" name="id_cliente" placeholder="{{ trans('admin.contrato.columns.id_cliente') }}">
        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_cliente') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_plano'), 'has-success': fields.id_plano && fields.id_plano.valid }">
    <label for="id_plano" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.id_plano') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_plano" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_plano'), 'form-control-success': fields.id_plano && fields.id_plano.valid}" id="id_plano" name="id_plano" placeholder="{{ trans('admin.contrato.columns.id_plano') }}">
        <div v-if="errors.has('id_plano')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_plano') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_conta'), 'has-success': fields.id_conta && fields.id_conta.valid }">
    <label for="id_conta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.id_conta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_conta" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_conta'), 'form-control-success': fields.id_conta && fields.id_conta.valid}" id="id_conta" name="id_conta" placeholder="{{ trans('admin.contrato.columns.id_conta') }}">
        <div v-if="errors.has('id_conta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_conta') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.contrato.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


