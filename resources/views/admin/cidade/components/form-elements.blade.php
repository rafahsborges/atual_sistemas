<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cidade.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.cidade.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ibge_code'), 'has-success': fields.ibge_code && fields.ibge_code.valid }">
    <label for="ibge_code" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cidade.columns.ibge_code') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ibge_code" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ibge_code'), 'form-control-success': fields.ibge_code && fields.ibge_code.valid}" id="ibge_code" name="ibge_code" placeholder="{{ trans('admin.cidade.columns.ibge_code') }}">
        <div v-if="errors.has('ibge_code')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ibge_code') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_uf'), 'has-success': fields.id_uf && fields.id_uf.valid }">
    <label for="id_uf" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cidade.columns.id_uf') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_uf" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_uf'), 'form-control-success': fields.id_uf && fields.id_uf.valid}" id="id_uf" name="id_uf" placeholder="{{ trans('admin.cidade.columns.id_uf') }}">
        <div v-if="errors.has('id_uf')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_uf') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.cidade.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>


