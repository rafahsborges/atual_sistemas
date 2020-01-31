@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.uf.actions.edit', ['name' => $uf->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <uf-form
                :action="'{{ $uf->resource_url }}'"
                :data="{{ $uf->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.uf.actions.edit', ['name' => $uf->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.uf.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </uf-form>

        </div>
    
</div>

@endsection