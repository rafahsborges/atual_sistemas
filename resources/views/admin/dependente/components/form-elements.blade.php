<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nome'), 'has-success': fields.nome && fields.nome.valid }">
    <label for="nome" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dependente.columns.nome') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nome" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nome'), 'form-control-success': fields.nome && fields.nome.valid}" id="nome" name="nome" placeholder="{{ trans('admin.dependente.columns.nome') }}">
        <div v-if="errors.has('nome')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nome') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nascimento'), 'has-success': fields.nascimento && fields.nascimento.valid }">
    <label for="nascimento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dependente.columns.nascimento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.nascimento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('nascimento'), 'form-control-success': fields.nascimento && fields.nascimento.valid}" id="nascimento" name="nascimento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('nascimento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nascimento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_cliente'), 'has-success': fields.id_cliente && fields.id_cliente.valid }">
    <label for="id_cliente" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dependente.columns.id_cliente') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_cliente" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_cliente'), 'form-control-success': fields.id_cliente && fields.id_cliente.valid}" id="id_cliente" name="id_cliente" placeholder="{{ trans('admin.dependente.columns.id_cliente') }}">
        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_cliente') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_parentesco'), 'has-success': fields.id_parentesco && fields.id_parentesco.valid }">
    <label for="id_parentesco" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.dependente.columns.id_parentesco') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_parentesco" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_parentesco'), 'form-control-success': fields.id_parentesco && fields.id_parentesco.valid}" id="id_parentesco" name="id_parentesco" placeholder="{{ trans('admin.dependente.columns.id_parentesco') }}">
        <div v-if="errors.has('id_parentesco')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_parentesco') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('enabled'), 'has-success': fields.enabled && fields.enabled.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="enabled" type="checkbox" v-model="form.enabled" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element">
        <label class="form-check-label" for="enabled">
            {{ trans('admin.dependente.columns.enabled') }}
        </label>
        <input type="hidden" name="enabled" :value="form.enabled">
        <div v-if="errors.has('enabled')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('enabled') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_cliente'), 'has-success': this.fields.id_cliente && this.fields.id_cliente.valid }">
    <label for="id_cliente"
           class="col-form-label text-center col-md-4 col-lg-3">{{ trans('admin.post.columns.id_cliente') }}</label>
    <div class="col-md-8 col-lg-9">

        <multiselect
            v-model="form.cliente"
            :options="{{ $clientes->toJson() }}"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ __('Select Author') }}"
            placeholder="{{ __('Author') }}">
        </multiselect>

        <div v-if="errors.has('id_cliente')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_cliente') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('id_parentesco'), 'has-success': this.fields.id_parentesco && this.fields.id_parentesco.valid }">
    <label for="id_parentesco"
           class="col-form-label text-center col-md-4 col-lg-3">{{ trans('admin.post.columns.id_parentesco') }}</label>
    <div class="col-md-8 col-lg-9">

        <multiselect
            v-model="form.parentesco"
            :options="{{ $parentescos->toJson() }}"
            :multiple="false"
            track-by="id"
            label="nome"
            tag-placeholder="{{ __('Select Author') }}"
            placeholder="{{ __('Author') }}">
        </multiselect>

        <div v-if="errors.has('id_parentesco')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('id_parentesco') }}
        </div>
    </div>
</div>
