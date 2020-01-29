<div class="form-group row align-items-center" :class="{'has-danger': errors.has('data'), 'has-success': fields.data && fields.data.valid }">
    <label for="data" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.remessa.columns.data') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.data" :config="datetimePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('data'), 'form-control-success': fields.data && fields.data.valid}" id="data" name="data" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('data')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('data') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_usuario'), 'has-success': fields.id_usuario && fields.id_usuario.valid }">
    <label for="id_usuario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.remessa.columns.id_usuario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_usuario" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_usuario'), 'form-control-success': fields.id_usuario && fields.id_usuario.valid}" id="id_usuario" name="id_usuario" placeholder="{{ trans('admin.remessa.columns.id_usuario') }}">
        <div v-if="errors.has('id_usuario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_usuario') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.remessa.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.remessa.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('sequencia'), 'has-success': fields.sequencia && fields.sequencia.valid }">
    <label for="sequencia" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.remessa.columns.sequencia') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.sequencia" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('sequencia'), 'form-control-success': fields.sequencia && fields.sequencia.valid}" id="sequencia" name="sequencia" placeholder="{{ trans('admin.remessa.columns.sequencia') }}">
        <div v-if="errors.has('sequencia')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('sequencia') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_conta'), 'has-success': fields.id_conta && fields.id_conta.valid }">
    <label for="id_conta" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.remessa.columns.id_conta') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_conta" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_conta'), 'form-control-success': fields.id_conta && fields.id_conta.valid}" id="id_conta" name="id_conta" placeholder="{{ trans('admin.remessa.columns.id_conta') }}">
        <div v-if="errors.has('id_conta')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_conta') }}</div>
    </div>
</div>


