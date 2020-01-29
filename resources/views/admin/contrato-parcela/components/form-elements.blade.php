<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_contrato'), 'has-success': fields.id_contrato && fields.id_contrato.valid }">
    <label for="id_contrato" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato.columns.id_contrato') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.contrato"
            :options="contratos"
            :multiple="false"
            track-by="id"
            label="id_cliente"
            tag-placeholder="{{ trans('admin.contrato.columns.id_contrato') }}"
            placeholder="{{ trans('admin.contrato.columns.id_contrato') }}">
        </multiselect>
        <div v-if="errors.has('id_contrato')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_contrato') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_contrato'), 'has-success': fields.id_contrato && fields.id_contrato.valid }">
    <label for="id_contrato" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.id_contrato') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_contrato" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_contrato'), 'form-control-success': fields.id_contrato && fields.id_contrato.valid}" id="id_contrato" name="id_contrato" placeholder="{{ trans('admin.contrato-parcela.columns.id_contrato') }}">
        <div v-if="errors.has('id_contrato')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_contrato') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('numero_parcela'), 'has-success': fields.numero_parcela && fields.numero_parcela.valid }">
    <label for="numero_parcela" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.numero_parcela') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.numero_parcela" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('numero_parcela'), 'form-control-success': fields.numero_parcela && fields.numero_parcela.valid}" id="numero_parcela" name="numero_parcela" placeholder="{{ trans('admin.contrato-parcela.columns.numero_parcela') }}">
        <div v-if="errors.has('numero_parcela')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('numero_parcela') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor'), 'has-success': fields.valor && fields.valor.valid }">
    <label for="valor" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.valor') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor'), 'form-control-success': fields.valor && fields.valor.valid}" id="valor" name="valor" placeholder="{{ trans('admin.contrato-parcela.columns.valor') }}">
        <div v-if="errors.has('valor')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vencimento'), 'has-success': fields.vencimento && fields.vencimento.valid }">
    <label for="vencimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.vencimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.vencimento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('vencimento'), 'form-control-success': fields.vencimento && fields.vencimento.valid}" id="vencimento" name="vencimento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('vencimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vencimento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('valor_pagamento'), 'has-success': fields.valor_pagamento && fields.valor_pagamento.valid }">
    <label for="valor_pagamento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.valor_pagamento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.valor_pagamento" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('valor_pagamento'), 'form-control-success': fields.valor_pagamento && fields.valor_pagamento.valid}" id="valor_pagamento" name="valor_pagamento" placeholder="{{ trans('admin.contrato-parcela.columns.valor_pagamento') }}">
        <div v-if="errors.has('valor_pagamento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('valor_pagamento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('pagamento'), 'has-success': fields.pagamento && fields.pagamento.valid }">
    <label for="pagamento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.pagamento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.pagamento" :config="datePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('pagamento'), 'form-control-success': fields.pagamento && fields.pagamento.valid}" id="pagamento" name="pagamento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('pagamento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('pagamento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_boleto'), 'has-success': fields.id_boleto && fields.id_boleto.valid }">
    <label for="id_boleto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.id_boleto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_boleto" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_boleto'), 'form-control-success': fields.id_boleto && fields.id_boleto.valid}" id="id_boleto" name="id_boleto" placeholder="{{ trans('admin.contrato-parcela.columns.id_boleto') }}">
        <div v-if="errors.has('id_boleto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_boleto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_carne'), 'has-success': fields.id_carne && fields.id_carne.valid }">
    <label for="id_carne" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.contrato-parcela.columns.id_carne') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_carne" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_carne'), 'form-control-success': fields.id_carne && fields.id_carne.valid}" id="id_carne" name="id_carne" placeholder="{{ trans('admin.contrato-parcela.columns.id_carne') }}">
        <div v-if="errors.has('id_carne')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_carne') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.contrato-parcela.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


