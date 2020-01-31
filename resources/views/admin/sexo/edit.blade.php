@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sexo.actions.edit', ['name' => $sexo->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <sexo-form
                :action="'{{ $sexo->resource_url }}'"
                :data="{{ $sexo->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.sexo.actions.edit', ['name' => $sexo->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.sexo.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </sexo-form>

        </div>
    
</div>

@endsection