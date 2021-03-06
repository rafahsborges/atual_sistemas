@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.contrato.actions.edit', ['name' => $contrato->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <contrato-form
                :action="'{{ $contrato->resource_url }}'"
                :data="{{ $contrato->toJson() }}"
                :clientes="{{$clientes->toJson()}}"
                :contas="{{$contas->toJson()}}"
                :planos="{{$planos->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" @change="changed"
                      novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.contrato.actions.edit', ['name' => $contrato->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.contrato.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </contrato-form>

        </div>

    </div>

@endsection
