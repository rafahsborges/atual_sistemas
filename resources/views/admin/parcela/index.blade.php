@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.parcela.actions.index'))

@section('body')

    <parcela-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/parcelas') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.parcela.actions.index') }}
                        <a class="btn btn-primary btn-sm pull-right m-b-0 ml-2" href="{{ url('admin/parcelas/export') }}"
                           role="button"><i
                                class="fa fa-file-excel-o"></i>&nbsp; {{ trans('admin.parcela.actions.export') }}</a>
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0"
                           href="{{ url('admin/parcelas/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.parcela.actions.create') }}
                        </a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control"
                                                   placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}"
                                                   v-model="search"
                                                   @keyup.enter="filter('search', $event.target.value)"/>
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary"
                                                        @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col form-group deadline-checkbox-col">
                                        <div class="switch-filter-wrap">
                                            <label class="switch switch-3d switch-primary">
                                                <input type="checkbox" class="switch-input"
                                                       v-model="showAdvancedFilter">
                                                <span class="switch-slider"></span>
                                            </label>
                                            <span class="authors-filter">&nbsp;{{ __('Filtros Avançados') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-auto form-group ">
                                        <select class="form-control" v-model="pagination.state.per_page">

                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" v-if="showAdvancedFilter">
                                    <div class="col col-lg-6 col-xl-6 form-group">
                                        <multiselect v-model="contratosMultiselect"
                                                     :options="{{ $contratos->map(function($contrato) { return ['key' => $contrato->id, 'label' =>  $contrato->cliente->nome]; })->toJson() }}"
                                                     label="label"
                                                     track-by="key"
                                                     placeholder="{{ __('Digite para procurar por contrato/s') }}"
                                                     :limit="2"
                                                     :multiple="true">
                                        </multiselect>
                                    </div>
                                    <div class="col col-lg-6 col-xl-6 form-group">
                                        <multiselect v-model="contratosMultiselect"
                                                     :options="{{ $contratos->map(function($contrato) { return ['key' => $contrato->id, 'label' =>  $contrato->cliente->nome]; })->toJson() }}"
                                                     label="label"
                                                     track-by="key"
                                                     placeholder="{{ __('Digite para procurar por contrato/s') }}"
                                                     :limit="2"
                                                     :multiple="true">
                                        </multiselect>
                                    </div>
                                    <div class="col col-lg-6 col-xl-6 form-group">
                                        <multiselect v-model="contratosMultiselect"
                                                     :options="{{ $contratos->map(function($contrato) { return ['key' => $contrato->id, 'label' =>  $contrato->cliente->nome]; })->toJson() }}"
                                                     label="label"
                                                     track-by="key"
                                                     placeholder="{{ __('Digite para procurar por contrato/s') }}"
                                                     :limit="2"
                                                     :multiple="true">
                                        </multiselect>
                                    </div>
                                </div>
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                <tr>
                                    <th class="bulk-checkbox">
                                        <input class="form-check-input" id="enabled" type="checkbox"
                                               v-model="isClickedAll" v-validate="''" data-vv-name="enabled"
                                               name="enabled_fake_element"
                                               @click="onBulkItemsClickedAllWithPagination()">
                                        <label class="form-check-label" for="enabled">
                                            #
                                        </label>
                                    </th>

                                    <th is='sortable'
                                        :column="'id'">{{ trans('admin.parcela.columns.id') }}</th>
                                    <th is='sortable'
                                        :column="'id_contrato'">{{ trans('admin.parcela.columns.id_contrato') }}</th>
                                    <th is='sortable'
                                        :column="'numero_parcela'">{{ trans('admin.parcela.columns.numero_parcela') }}</th>
                                    <th is='sortable'
                                        :column="'valor'">{{ trans('admin.parcela.columns.valor') }}</th>
                                    <th is='sortable'
                                        :column="'vencimento'">{{ trans('admin.parcela.columns.vencimento') }}</th>
                                    <th is='sortable'
                                        :column="'pagamento'">{{ trans('admin.parcela.columns.pagamento') }}</th>
                                    <th is='sortable'
                                        :column="'valor_pagamento'">{{ trans('admin.parcela.columns.valor_pagamento') }}</th>
                                    <th is='sortable'
                                        :column="'enabled'">{{ trans('admin.parcela.columns.enabled') }}</th>

                                    <th></th>
                                </tr>
                                <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                    <td class="bg-bulk-info d-table-cell text-center" colspan="12">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a
                                                    href="#" class="text-primary"
                                                    @click="onBulkItemsClickedAll('/admin/parcelas')"
                                                    v-if="(clickedBulkItemsCount < pagination.state.total)"> <i
                                                        class="fa"
                                                        :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span
                                                    class="text-primary">|</span> <a
                                                    href="#" class="text-primary"
                                                    @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                        <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3"
                                                        @click="bulkDelete('/admin/parcelas/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in collection" :key="item.id"
                                    :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                    <td class="bulk-checkbox">
                                        <input class="form-check-input" :id="'enabled' + item.id" type="checkbox"
                                               v-model="bulkItems[item.id]" v-validate="''"
                                               :data-vv-name="'enabled' + item.id"
                                               :name="'enabled' + item.id + '_fake_element'"
                                               @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                        <label class="form-check-label" :for="'enabled' + item.id">
                                        </label>
                                    </td>

                                    <td>@{{ item.id }}</td>
                                    <td>@{{ item.contrato.cliente.nome }}</td>
                                    <td>@{{ item.numero_parcela }}</td>
                                    <td>R$ @{{ item.valor }}</td>
                                    <td>@{{ item.vencimento | date('DD/MM/YYYY') }}</td>
                                    <td>@{{ item.pagamento | date('DD/MM/YYYY') }}</td>
                                    <td>R$ @{{ item.valor_pagamento }}</td>
                                    <td>
                                        <label class="switch switch-3d switch-success">
                                            <input type="checkbox" class="switch-input"
                                                   v-model="collection[index].enabled"
                                                   @change="toggleSwitch(item.resource_url, 'enabled', collection[index])">
                                            <span class="switch-slider"></span>
                                        </label>
                                    </td>


                                    <td>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <a class="btn btn-sm btn-spinner btn-info"
                                                   :href="item.resource_url + '/edit'"
                                                   title="{{ trans('brackets/admin-ui::admin.btn.edit') }}"
                                                   role="button"><i class="fa fa-edit"></i></a>
                                            </div>
                                            <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                        title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i
                                                        class="fa fa-trash-o"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span
                                        class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner"
                                   href="{{ url('admin/parcelas/create') }}" role="button"><i
                                        class="fa fa-plus"></i>&nbsp; {{ trans('admin.parcela.actions.create') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </parcela-listing>

@endsection
