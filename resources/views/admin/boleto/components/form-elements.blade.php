<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_contrato_parcela'), 'has-success': fields.id_contrato_parcela && fields.id_contrato_parcela.valid }">
    <label for="id_contrato_parcela" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.boleto.columns.id_contrato_parcela') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_contrato_parcela" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_contrato_parcela'), 'form-control-success': fields.id_contrato_parcela && fields.id_contrato_parcela.valid}" id="id_contrato_parcela" name="id_contrato_parcela" placeholder="{{ trans('admin.boleto.columns.id_contrato_parcela') }}">
        <div v-if="errors.has('id_contrato_parcela')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_contrato_parcela') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('status'), 'has-success': fields.status && fields.status.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="status" type="checkbox" v-model="form.status" v-validate="''" data-vv-name="status"  name="status_fake_element">
        <label class="form-check-label" for="status">
            {{ trans('admin.boleto.columns.status') }}
        </label>
        <input type="hidden" name="status" :value="form.status">
        <div v-if="errors.has('status')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('status') }}</div>
    </div>
</div>
