@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.estado-civil.actions.edit', ['name' => $estadoCivil->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <estado-civil-form
                :action="'{{ $estadoCivil->resource_url }}'"
                :data="{{ $estadoCivil->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.estado-civil.actions.edit', ['name' => $estadoCivil->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.estado-civil.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </estado-civil-form>

        </div>
    
</div>

@endsection