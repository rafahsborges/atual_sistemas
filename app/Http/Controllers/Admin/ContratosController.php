<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contrato\BulkCarteiraContrato;
use App\Http\Requests\Admin\Contrato\BulkDestroyContrato;
use App\Http\Requests\Admin\Contrato\DestroyContrato;
use App\Http\Requests\Admin\Contrato\IndexContrato;
use App\Http\Requests\Admin\Contrato\StoreContrato;
use App\Http\Requests\Admin\Contrato\UpdateContrato;
use App\Models\Cliente;
use App\Models\Conta;
use App\Models\Contrato;
use App\Models\Parcela;
use App\Models\Plano;
use Brackets\AdminListing\Facades\AdminListing;
use Carbon\Carbon;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use PDF;

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
            ['id'],

            function ($query) use ($request) {
                $query->with(['cliente']);
                if ($request->has('clientes')) {
                    $query->whereIn('id_cliente', $request->get('clientes'));
                }
                $query->with(['conta']);
                if ($request->has('contas')) {
                    $query->whereIn('id_conta', $request->get('contas'));
                }
                $query->with(['plano']);
                if ($request->has('planos')) {
                    $query->whereIn('id_plano', $request->get('planos'));
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
     * @throws Exception
     */
    public function store(StoreContrato $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_cliente'] = $request->getClienteId();
        $sanitized['id_conta'] = $request->getContaId();
        $sanitized['id_plano'] = $request->getPlanoId();
        $sanitized['tipo_pagamento'] = $request->getTipoPagamentoId();
        $sanitized['valor'] = $request->prepareCurrencies($sanitized['valor']);
        $sanitized['juros'] = $request->prepareCurrencies($sanitized['juros']);
        $sanitized['multa'] = $request->prepareCurrencies($sanitized['multa']);
        $sanitized['desconto'] = $request->prepareCurrencies($sanitized['desconto']);

        $to = Carbon::createFromFormat('Y-m-d H:s:i', $sanitized['data_assinatura']);
        $from = Carbon::createFromFormat('Y-m-d H:s:i', $sanitized['validade_contrato']);
        $diff_in_months = $to->diffInMonths($from);
        $valor_parcela = round($sanitized['valor'] / $sanitized['qtd_parcelas'], 2);

        $primeira_parcela = Carbon::createFromFormat('Y-m-d H:s:i', $sanitized['primeira_parcela']);

        // Store the Contrato
        $contrato = Contrato::create($sanitized);

        $parcelas = [];

        if ($contrato->id) {
            for ($i = 0; $i < $diff_in_months; $i++) {
                $vencimento_parcela = new Carbon($primeira_parcela);
                $parcelas[] = array(
                    'vencimento' => $vencimento_parcela->addMonths($i)->toDateString(),
                    'valor' => $valor_parcela,
                    'numero_parcela' => $i + 1,
                    'id_contrato' => $contrato->id,
                    'enabled' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                );
            }
        }

        foreach ($parcelas as $parcela) {
            // Store the Parcela
            $parcela = Parcela::create($parcela);
        }

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

        $contrato = Contrato::with('cliente')
            ->with('plano')
            ->with('conta')
            ->find($contrato->id);

        if ($contrato->tipo_pagamento === '1') {
            $contrato['pagamento'] = array('nome' => 'Boleto', 'id' => 1);
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['pagamento'] = array('nome' => 'Carnê', 'id' => 2);
        }

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
        $sanitized['valor'] = $request->prepareCurrencies($sanitized['valor']);
        $sanitized['juros'] = $request->prepareCurrencies($sanitized['juros']);
        $sanitized['multa'] = $request->prepareCurrencies($sanitized['multa']);
        $sanitized['desconto'] = $request->prepareCurrencies($sanitized['desconto']);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contrato $contrato
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function carteira(Contrato $contrato)
    {
        $this->authorize('admin.contrato.edit', $contrato);

        $contrato = Contrato::with('cliente')
            ->with('cliente.dependentes')
            ->with('plano')
            ->with('conta')
            ->find($contrato->id);

        if ($contrato->tipo_pagamento === '1') {
            $contrato['pagamento'] = array('nome' => 'Boleto', 'id' => 1);
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['pagamento'] = array('nome' => 'Carnê', 'id' => 2);
        }

        $pdf = PDF::loadView('pdf.carteira',
            [
                'id' => $contrato->cliente->id,
                'nome' => $contrato->cliente->nome,
                'nascimento' => $contrato->cliente->nascimento,
                'validade' => $contrato->validade_contrato,
                'dependentes' => $contrato->cliente->dependentes,
                'plano' => $contrato->plano_funeral,
            ]
        );

        return $pdf->download('carteira.pdf');
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkCarteiraContrato $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkCarteira(BulkCarteiraContrato $request): Response
    {
        $contratos = [];

        foreach ($request->data['ids'] as $ids) {
            $contrato = Contrato::with('cliente')
                ->with('cliente.dependentes')
                ->with('plano')
                ->with('conta')
                ->find($ids);

            if ($contrato->tipo_pagamento === '1') {
                $contrato['pagamento'] = array('nome' => 'Boleto', 'id' => 1);
            }

            if ($contrato->tipo_pagamento === '2') {
                $contrato['pagamento'] = array('nome' => 'Carnê', 'id' => 2);
            }

            $contratos[] = [
                'id' => $contrato->cliente->id,
                'nome' => $contrato->cliente->nome,
                'nascimento' => $contrato->cliente->nascimento,
                'validade' => $contrato->validade_contrato,
                'dependentes' => $contrato->cliente->dependentes,
                'plano' => $contrato->plano_funeral,
            ];
        }

        $pdf = PDF::loadView('pdf.carteiras',
            [
                'carteiras' => $contratos
            ]
        );

        return $pdf->download('carteira.pdf');

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
