@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.contrato-parcela.actions.edit', ['name' => $contratoParcela->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <contrato-parcela-form
                :action="'{{ $contratoParcela->resource_url }}'"
                :data="{{ $contratoParcela->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.contrato-parcela.actions.edit', ['name' => $contratoParcela->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.contrato-parcela.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </contrato-parcela-form>

        </div>
    
</div>

@endsection