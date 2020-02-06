@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.relatorio.actions.index'))

@section('body')

    <div class="container-xl">

        <div class="card">

            <relatorio-form
                :action="'{{ url('admin/relatorios') }}'"
                v-cloak
                inline-template>

                <form class="form-horizontal form-create" method="get" @submit.prevent="onSubmit" :action="action"
                      @change="changed"
                      @submit="setValues"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-plus"></i> {{ trans('admin.relatorio.actions.export') }}
                    </div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group align-items-center"
                                     :class="{'has-danger': errors.has('inicio'), 'has-success': fields.inicio && fields.inicio.valid }">
                                    <label for="inicio" class="col-form-label text-md-right"
                                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.relatorio.columns.inicio') }}</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <datetime v-model="form.inicio" :config="datePickerConfig"
                                                  v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'"
                                                  class="flatpickr"
                                                  :class="{'form-control-danger': errors.has('inicio'), 'form-control-success': fields.inicio && fields.inicio.valid}"
                                                  id="inicio" name="inicio"
                                                  placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
                                    </div>
                                    <div v-if="errors.has('inicio')" class="form-control-feedback form-text" v-cloak>@{{
                                        errors.first('inicio') }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group align-items-center"
                                     :class="{'has-danger': errors.has('fim'), 'has-success': fields.fim && fields.fim.valid }">
                                    <label for="fim" class="col-form-label text-md-right"
                                           :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.relatorio.columns.fim') }}</label>
                                    <div class="input-group input-group--custom">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <datetime v-model="form.fim" :config="datePickerConfig"
                                                  v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'"
                                                  class="flatpickr"
                                                  :class="{'form-control-danger': errors.has('fim'), 'form-control-success': fields.fim && fields.fim.valid}"
                                                  id="fim" name="fim"
                                                  placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
                                    </div>
                                    <div v-if="errors.has('fim')" class="form-control-feedback form-text" v-cloak>@{{
                                        errors.first('fim') }}
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('admin.relatorio.actions.export') }}
                        </button>
                    </div>

                </form>

            </relatorio-form>

        </div>

    </div>

@endsection
