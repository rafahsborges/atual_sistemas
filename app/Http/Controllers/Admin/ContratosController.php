<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contrato\BulkDestroyContrato;
use App\Http\Requests\Admin\Contrato\DestroyContrato;
use App\Http\Requests\Admin\Contrato\IndexContrato;
use App\Http\Requests\Admin\Contrato\StoreContrato;
use App\Http\Requests\Admin\Contrato\UpdateContrato;
use App\Models\Cliente;
use App\Models\Conta;
use App\Models\Contrato;
use App\Models\Plano;
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

class ContratosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexContrato $request
     * @return array|Factory|View
     */
    public function index(IndexContrato $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Contrato::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'primeira_parcela', 'ultima_parcela', 'data_assinatura', 'qtd_parcelas', 'tipo_pagamento', 'valor', 'plano_funeral', 'desconto', 'juros', 'multa', 'validade_contrato', 'id_cliente', 'id_plano', 'id_conta', 'enabled'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.contrato.index', [
            'data' => $data,
            'clientes' => Cliente::all(),
            'contas' => Conta::all(),
            'planos' => Plano::all(),
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
        $this->authorize('admin.contrato.create');

        return view('admin.contrato.create', [
            'clientes' => Cliente::all(),
            'contas' => Conta::all(),
            'planos' => Plano::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContrato $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreContrato $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();
        $sanitized['id_conta'] = $request->getContaId();
        $sanitized['id_plano'] = $request->getPlanoId();
        $sanitized['tipo_pagamento'] = $request->getTipoPagamentoId();
        $sanitized['valor'] = $request->keepOnlyDigits($sanitized['valor']);
        $sanitized['juros'] = $request->keepOnlyDigits($sanitized['juros']);
        $sanitized['multa'] = $request->keepOnlyDigits($sanitized['multa']);
        $sanitized['desconto'] = $request->keepOnlyDigits($sanitized['desconto']);

        // Store the Contrato
        $contrato = Contrato::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contratos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contratos');
    }

    /**
     * Display the specified resource.
     *
     * @param Contrato $contrato
     * @return void
     * @throws AuthorizationException
     */
    public function show(Contrato $contrato)
    {
        $this->authorize('admin.contrato.show', $contrato);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contrato $contrato
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Contrato $contrato)
    {
        $this->authorize('admin.contrato.edit', $contrato);


        return view('admin.contrato.edit', [
            'contrato' => $contrato,
            'clientes' => Cliente::all(),
            'contas' => Conta::all(),
            'planos' => Plano::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContrato $request
     * @param Contrato $contrato
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateContrato $request, Contrato $contrato)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();
        $sanitized['id_conta'] = $request->getContaId();
        $sanitized['id_plano'] = $request->getPlanoId();
        $sanitized['tipo_pagamento'] = $request->getTipoPagamentoId();
        $sanitized['valor'] = $request->keepOnlyDigits($sanitized['valor']);
        $sanitized['juros'] = $request->keepOnlyDigits($sanitized['juros']);
        $sanitized['multa'] = $request->keepOnlyDigits($sanitized['multa']);
        $sanitized['desconto'] = $request->keepOnlyDigits($sanitized['desconto']);

        // Update changed values Contrato
        $contrato->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/contratos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/contratos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyContrato $request
     * @param Contrato $contrato
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyContrato $request, Contrato $contrato)
    {
        $contrato->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyContrato $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyContrato $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('contratos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
