<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_boleto'), 'has-success': fields.id_boleto && fields.id_boleto.valid }">
    <label for="id_boleto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.remessa-boleto.columns.id_boleto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_boleto" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_boleto'), 'form-control-success': fields.id_boleto && fields.id_boleto.valid}" id="id_boleto" name="id_boleto" placeholder="{{ trans('admin.remessa-boleto.columns.id_boleto') }}">
        <div v-if="errors.has('id_boleto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_boleto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_remessa'), 'has-success': fields.id_remessa && fields.id_remessa.valid }">
    <label for="id_remessa" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.remessa-boleto.columns.id_remessa') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_remessa" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_remessa'), 'form-control-success': fields.id_remessa && fields.id_remessa.valid}" id="id_remessa" name="id_remessa" placeholder="{{ trans('admin.remessa-boleto.columns.id_remessa') }}">
        <div v-if="errors.has('id_remessa')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_remessa') }}</div>
    </div>
</div>


