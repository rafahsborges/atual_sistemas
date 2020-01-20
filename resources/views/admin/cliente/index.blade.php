@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cliente.actions.index'))

@section('body')

    <cliente-listing
        :data="{{ $data->toJson() }}"
        :url="'{{ url('admin/clientes') }}'"
        inline-template>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-align-justify"></i> {{ trans('admin.cliente.actions.index') }}
                        <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0" href="{{ url('admin/clientes/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.cliente.actions.create') }}</a>
                    </div>
                    <div class="card-body" v-cloak>
                        <div class="card-block">
                            <form @submit.prevent="">
                                <div class="row justify-content-md-between">
                                    <div class="col col-lg-7 col-xl-5 form-group">
                                        <div class="input-group">
                                            <input class="form-control" placeholder="{{ trans('brackets/admin-ui::admin.placeholder.search') }}" v-model="search" @keyup.enter="filter('search', $event.target.value)" />
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary" @click="filter('search', search)"><i class="fa fa-search"></i>&nbsp; {{ trans('brackets/admin-ui::admin.btn.search') }}</button>
                                            </span>
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
                            </form>

                            <table class="table table-hover table-listing">
                                <thead>
                                    <tr>
                                        <th class="bulk-checkbox">
                                            <input class="form-check-input" id="enabled" type="checkbox" v-model="isClickedAll" v-validate="''" data-vv-name="enabled"  name="enabled_fake_element" @click="onBulkItemsClickedAllWithPagination()">
                                            <label class="form-check-label" for="enabled">
                                                #
                                            </label>
                                        </th>

                                        <th is='sortable' :column="'id'">{{ trans('admin.cliente.columns.id') }}</th>
                                        <th is='sortable' :column="'tipo'">{{ trans('admin.cliente.columns.tipo') }}</th>
                                        <th is='sortable' :column="'nome'">{{ trans('admin.cliente.columns.nome') }}</th>
                                        <th is='sortable' :column="'nascimento'">{{ trans('admin.cliente.columns.nascimento') }}</th>
                                        <th is='sortable' :column="'rg'">{{ trans('admin.cliente.columns.rg') }}</th>
                                        <th is='sortable' :column="'cpf'">{{ trans('admin.cliente.columns.cpf') }}</th>
                                        <th is='sortable' :column="'insc_municipal'">{{ trans('admin.cliente.columns.insc_municipal') }}</th>
                                        <th is='sortable' :column="'cnpj'">{{ trans('admin.cliente.columns.cnpj') }}</th>
                                        <th is='sortable' :column="'sexo'">{{ trans('admin.cliente.columns.sexo') }}</th>
                                        <th is='sortable' :column="'profissao'">{{ trans('admin.cliente.columns.profissao') }}</th>
                                        <th is='sortable' :column="'local_trabalho'">{{ trans('admin.cliente.columns.local_trabalho') }}</th>
                                        <th is='sortable' :column="'telefone'">{{ trans('admin.cliente.columns.telefone') }}</th>
                                        <th is='sortable' :column="'celular'">{{ trans('admin.cliente.columns.celular') }}</th>
                                        <th is='sortable' :column="'logradouro'">{{ trans('admin.cliente.columns.logradouro') }}</th>
                                        <th is='sortable' :column="'numero'">{{ trans('admin.cliente.columns.numero') }}</th>
                                        <th is='sortable' :column="'complemento'">{{ trans('admin.cliente.columns.complemento') }}</th>
                                        <th is='sortable' :column="'bairro'">{{ trans('admin.cliente.columns.bairro') }}</th>
                                        <th is='sortable' :column="'cidade'">{{ trans('admin.cliente.columns.cidade') }}</th>
                                        <th is='sortable' :column="'uf'">{{ trans('admin.cliente.columns.uf') }}</th>
                                        <th is='sortable' :column="'email'">{{ trans('admin.cliente.columns.email') }}</th>
                                        <th is='sortable' :column="'observacao'">{{ trans('admin.cliente.columns.observacao') }}</th>
                                        <th is='sortable' :column="'cep'">{{ trans('admin.cliente.columns.cep') }}</th>
                                        <th is='sortable' :column="'celular2'">{{ trans('admin.cliente.columns.celular2') }}</th>
                                        <th is='sortable' :column="'celular3'">{{ trans('admin.cliente.columns.celular3') }}</th>
                                        <th is='sortable' :column="'id_cliente_responsavel'">{{ trans('admin.cliente.columns.id_cliente_responsavel') }}</th>
                                        <th is='sortable' :column="'id_estado_civil'">{{ trans('admin.cliente.columns.id_estado_civil') }}</th>
                                        <th is='sortable' :column="'enabled'">{{ trans('admin.cliente.columns.enabled') }}</th>

                                        <th></th>
                                    </tr>
                                    <tr v-show="(clickedBulkItemsCount > 0) || isClickedAll">
                                        <td class="bg-bulk-info d-table-cell text-center" colspan="29">
                                            <span class="align-middle font-weight-light text-dark">{{ trans('brackets/admin-ui::admin.listing.selected_items') }} @{{ clickedBulkItemsCount }}.  <a href="#" class="text-primary" @click="onBulkItemsClickedAll('/admin/clientes')" v-if="(clickedBulkItemsCount < pagination.state.total)"> <i class="fa" :class="bulkCheckingAllLoader ? 'fa-spinner' : ''"></i> {{ trans('brackets/admin-ui::admin.listing.check_all_items') }} @{{ pagination.state.total }}</a> <span class="text-primary">|</span> <a
                                                        href="#" class="text-primary" @click="onBulkItemsClickedAllUncheck()">{{ trans('brackets/admin-ui::admin.listing.uncheck_all_items') }}</a>  </span>

                                            <span class="pull-right pr-2">
                                                <button class="btn btn-sm btn-danger pr-3 pl-3" @click="bulkDelete('/admin/clientes/bulk-destroy')">{{ trans('brackets/admin-ui::admin.btn.delete') }}</button>
                                            </span>

                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in collection" :key="item.id" :class="bulkItems[item.id] ? 'bg-bulk' : ''">
                                        <td class="bulk-checkbox">
                                            <input class="form-check-input" :id="'enabled' + item.id" type="checkbox" v-model="bulkItems[item.id]" v-validate="''" :data-vv-name="'enabled' + item.id"  :name="'enabled' + item.id + '_fake_element'" @click="onBulkItemClicked(item.id)" :disabled="bulkCheckingAllLoader">
                                            <label class="form-check-label" :for="'enabled' + item.id">
                                            </label>
                                        </td>

                                    <td>@{{ item.id }}</td>
                                        <td>@{{ item.tipo }}</td>
                                        <td>@{{ item.nome }}</td>
                                        <td>@{{ item.nascimento | date }}</td>
                                        <td>@{{ item.rg }}</td>
                                        <td>@{{ item.cpf }}</td>
                                        <td>@{{ item.insc_municipal }}</td>
                                        <td>@{{ item.cnpj }}</td>
                                        <td>@{{ item.sexo }}</td>
                                        <td>@{{ item.profissao }}</td>
                                        <td>@{{ item.local_trabalho }}</td>
                                        <td>@{{ item.telefone }}</td>
                                        <td>@{{ item.celular }}</td>
                                        <td>@{{ item.logradouro }}</td>
                                        <td>@{{ item.numero }}</td>
                                        <td>@{{ item.complemento }}</td>
                                        <td>@{{ item.bairro }}</td>
                                        <td>@{{ item.cidade }}</td>
                                        <td>@{{ item.uf }}</td>
                                        <td>@{{ item.email }}</td>
                                        <td>@{{ item.observacao }}</td>
                                        <td>@{{ item.cep }}</td>
                                        <td>@{{ item.celular2 }}</td>
                                        <td>@{{ item.celular3 }}</td>
                                        <td>@{{ item.id_cliente_responsavel }}</td>
                                        <td>@{{ item.id_estado_civil }}</td>
                                        <td>
                                            <label class="switch switch-3d switch-success">
                                                <input type="checkbox" class="switch-input" v-model="collection[index].enabled" @change="toggleSwitch(item.resource_url, 'enabled', collection[index])">
                                                <span class="switch-slider"></span>
                                            </label>
                                        </td>

                                        
                                        <td>
                                            <div class="row no-gutters">
                                                <div class="col-auto">
                                                    <a class="btn btn-sm btn-spinner btn-info" :href="item.resource_url + '/edit'" title="{{ trans('brackets/admin-ui::admin.btn.edit') }}" role="button"><i class="fa fa-edit"></i></a>
                                                </div>
                                                <form class="col" @submit.prevent="deleteItem(item.resource_url)">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="{{ trans('brackets/admin-ui::admin.btn.delete') }}"><i class="fa fa-trash-o"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="row" v-if="pagination.state.total > 0">
                                <div class="col-sm">
                                    <span class="pagination-caption">{{ trans('brackets/admin-ui::admin.pagination.overview') }}</span>
                                </div>
                                <div class="col-sm-auto">
                                    <pagination></pagination>
                                </div>
                            </div>

                            <div class="no-items-found" v-if="!collection.length > 0">
                                <i class="icon-magnifier"></i>
                                <h3>{{ trans('brackets/admin-ui::admin.index.no_items') }}</h3>
                                <p>{{ trans('brackets/admin-ui::admin.index.try_changing_items') }}</p>
                                <a class="btn btn-primary btn-spinner" href="{{ url('admin/clientes/create') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('admin.cliente.actions.create') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </cliente-listing>

@endsection