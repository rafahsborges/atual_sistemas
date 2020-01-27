<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.name') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="text" v-model="form.name" v-validate="''" @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}"
               id="name" name="name" placeholder="{{ trans('admin.admin-user.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.email') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="text" v-model="form.email" v-validate="'required|email'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}"
               id="email" name="email" placeholder="{{ trans('admin.admin-user.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('password'), 'has-success': fields.password && fields.password.valid }">
    <label for="password" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.password') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="password" v-model="form.password" v-validate="'min:7'" @input="validate($event)"
               class="form-control"
               :class="{'form-control-danger': errors.has('password'), 'form-control-success': fields.password && fields.password.valid}"
               id="password" name="password" placeholder="{{ trans('admin.admin-user.columns.password') }}"
               ref="password">
        <div v-if="errors.has('password')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('password')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('password_confirmation'), 'has-success': fields.password_confirmation && fields.password_confirmation.valid }">
    <label for="password_confirmation" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.password_repeat') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <input type="password" v-model="form.password_confirmation" v-validate="'confirmed:password|min:7'"
               @input="validate($event)" class="form-control"
               :class="{'form-control-danger': errors.has('password_confirmation'), 'form-control-success': fields.password_confirmation && fields.password_confirmation.valid}"
               id="password_confirmation" name="password_confirmation"
               placeholder="{{ trans('admin.admin-user.columns.password') }}" data-vv-as="password">
        <div v-if="errors.has('password_confirmation')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('password_confirmation') }}
        </div>
    </div>
</div>

<div class="form-group row"
     :class="{'has-danger': errors.has('is_admin'), 'has-success': fields.is_admin && fields.is_admin.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-9'">
        <input class="form-check-input" id="is_admin" type="checkbox" v-model="form.is_admin" v-validate="''"
               data-vv-name="is_admin" name="is_admin_fake_element">
        <label class="form-check-label" for="is_admin">
            {{ trans('admin.admin-user.columns.is_admin') }}
        </label>
        <input type="hidden" name="is_admin" :value="form.is_admin">
        <div v-if="errors.has('is_admin')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_admin')
            }}
        </div>
    </div>
</div>

<div class="form-group row"
     :class="{'has-danger': errors.has('activated'), 'has-success': fields.activated && fields.activated.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-9'">
        <input class="form-check-input" id="activated" type="checkbox" v-model="form.activated" v-validate="''"
               data-vv-name="activated" name="activated_fake_element">
        <label class="form-check-label" for="activated">
            {{ trans('admin.admin-user.columns.activated') }}
        </label>
        <input type="hidden" name="activated" :value="form.activated">
        <div v-if="errors.has('activated')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('activated') }}
        </div>
    </div>
</div>

<div class="form-group row"
     :class="{'has-danger': errors.has('forbidden'), 'has-success': fields.forbidden && fields.forbidden.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-9'">
        <input class="form-check-input" id="forbidden" type="checkbox" v-model="form.forbidden" v-validate="''"
               data-vv-name="forbidden" name="forbidden_fake_element">
        <label class="form-check-label" for="forbidden">
            {{ trans('admin.admin-user.columns.forbidden') }}
        </label>
        <input type="hidden" name="forbidden" :value="form.forbidden">
        <div v-if="errors.has('forbidden')" class="form-control-feedback form-text" v-cloak>@{{
            errors.first('forbidden') }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('language'), 'has-success': fields.language && fields.language.valid }">
    <label for="language" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.language') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <multiselect v-model="form.language"
                     placeholder="{{ trans('brackets/admin-ui::admin.forms.select_an_option') }}"
                     :options="{{ $locales->toJson() }}" open-direction="bottom"></multiselect>
        <div v-if="errors.has('language')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('language')
            }}
        </div>
    </div>
</div>

<div class="form-group row align-items-center"
     :class="{'has-danger': errors.has('roles'), 'has-success': fields.roles && fields.roles.valid }">
    <label for="roles" class="col-form-label text-md-right"
           :class="isFormLocalized ? 'col-md-4' : 'col-md-3'">{{ trans('admin.admin-user.columns.roles') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-7'">
        <multiselect v-model="form.roles" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_options') }}"
                     label="name" track-by="id" :options="{{ $roles->toJson() }}" :multiple="true"
                     open-direction="bottom"></multiselect>
        <div v-if="errors.has('roles')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('roles') }}
        </div>
    </div>
</div>
