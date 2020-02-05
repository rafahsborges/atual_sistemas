<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Cliente\BulkDestroyCliente;
use App\Http\Requests\Admin\Cliente\DestroyCliente;
use App\Http\Requests\Admin\Cliente\IndexCliente;
use App\Http\Requests\Admin\Cliente\StoreCliente;
use App\Http\Requests\Admin\Cliente\UpdateCliente;
use App\Models\Cidade;
use App\Models\Cliente;
use App\Models\EstadoCivil;
use App\Models\Sexo;
use App\Models\Uf;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ClientesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCliente $request
     * @return array|Factory|View
     */
    public function index(IndexCliente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Cliente::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'tipo', 'nome', 'nascimento', 'rg', 'cpf', 'insc_municipal', 'cnpj', 'id_sexo', 'profissao', 'local_trabalho', 'telefone', 'celular', 'logradouro', 'numero', 'complemento', 'bairro', 'id_cidade', 'id_uf', 'email', 'observacao', 'cep', 'celular2', 'celular3', 'id_cliente_responsavel', 'id_estado_civil', 'enabled', 'deleted_at'],

            // set columns to searchIn
            ['id', 'nome', 'rg', 'cpf', 'insc_municipal', 'cnpj', 'id_sexo', 'profissao', 'local_trabalho', 'telefone', 'celular', 'logradouro', 'numero', 'complemento', 'bairro', 'id_cidade', 'id_uf', 'email', 'observacao', 'cep', 'celular2', 'celular3', 'deleted_at'],

            function ($query) use ($request) {
                $query->with(['civil']);
                if ($request->has('tipos')) {
                    $query->whereIn('tipo', $request->get('tipos'));
                }
                if ($request->has('status')) {
                    $query->whereIn('enabled', $request->get('status'));
                }
                if ($request->has('cpfs')) {
                    $query->whereIn('cpf', $request->get('cpfs'));
                }
                if ($request->has('cnpjs')) {
                    $query->whereIn('cnpj', $request->get('cnpjs'));
                }
            }
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.cliente.index', [
            'data' => $data,
            'civils' => EstadoCivil::all(),
            'empresas' => Cliente::where('tipo', 1)->get(),
            'cpfs' => Cliente::select('cpf')->whereNotNull('cpf')->get(),
            'cnpjs' => Cliente::select('cnpj')->whereNotNull('cnpj')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.cliente.create');

        return view('admin.cliente.create', [
            'civils' => EstadoCivil::all(),
            'sexos' => Sexo::all(),
            'ufs' => Uf::all(),
            'cidades' => Cidade::all(),
            'empresas' => Cliente::where('tipo', 1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCliente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCliente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_estado_civil'] = $request->getEstadoCivilId();
        $sanitized['id_cliente_responsavel'] = $request->getClienteResponsavelId();
        $sanitized['id_uf'] = $request->getUfId();
        $sanitized['id_sexo'] = $request->getSexoId();
        $sanitized['id_cidade'] = $request->getCidadeId();

        // Store the Cliente
        $cliente = Cliente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/clientes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param Cliente $cliente
     * @return void
     * @throws AuthorizationException
     */
    public function show(Cliente $cliente)
    {
        $this->authorize('admin.cliente.show', $cliente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Cliente $cliente
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Cliente $cliente)
    {
        $this->authorize('admin.cliente.edit', $cliente);

        $id = $cliente->id;
        $hasEmpresa = $cliente->id_cliente_responsavel;

        $cliente = Cliente::with('civil')
            ->with('sexo')
            ->with('uf')
            ->with('cidade')
            ->find($id);

        if ($hasEmpresa) {
            $cliente['empresa'] = Cliente::where('id', $hasEmpresa)->get();
        }

        return view('admin.cliente.edit', [
            'cliente' => $cliente,
            'civils' => EstadoCivil::all(),
            'sexos' => Sexo::all(),
            'ufs' => Uf::all(),
            'cidades' => Cidade::all(),
            'empresas' => Cliente::where('tipo', 1)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCliente $request
     * @param Cliente $cliente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCliente $request, Cliente $cliente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_estado_civil'] = $request->getEstadoCivilId();
        $sanitized['id_cliente_responsavel'] = $request->getClienteResponsavelId();
        $sanitized['id_uf'] = $request->getUfId();
        $sanitized['id_sexo'] = $request->getSexoId();
        $sanitized['id_cidade'] = $request->getCidadeId();

        // Update changed values Cliente
        $cliente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/clientes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCliente $request
     * @param Cliente $cliente
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyCliente $request, Cliente $cliente)
    {
        $cliente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCliente $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyCliente $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('clientes')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
