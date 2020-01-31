@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.dependente.actions.edit', ['name' => $dependente->nome]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <dependente-form
                :action="'{{ $dependente->resource_url }}'"
                :data="{{ $dependente->toJson() }}"
                :clientes="{{$clientes->toJson()}}"
                :parentescos="{{$parentescos->toJson()}}"
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action"
                      novalidate>

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.dependente.actions.edit', ['name' => $dependente->nome]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.dependente.components.form-elements')
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

            </dependente-form>

        </div>

    </div>

@endsection
