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
use Eduardokum\LaravelBoleto\Boleto\Banco\Bradesco;
use Eduardokum\LaravelBoleto\Boleto\Banco\Sicredi;
use Eduardokum\LaravelBoleto\Pessoa;
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
        $sanitized['valor_parcela'] = $request->prepareCurrencies($sanitized['valor_parcela']);
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
            $contrato['tipo_pagamento'] = array('nome' => 'Boleto', 'id' => 1);
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['tipo_pagamento'] = array('nome' => 'Carnê', 'id' => 2);
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
        $sanitized['valor_parcela'] = $request->prepareCurrencies($sanitized['valor_parcela']);
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
     * @param $ids
     * @return Response|bool
     */
    public function bulkCarteira($ids): Response
    {
        $ids = explode(',', $ids);
        $contratos = [];

        foreach ($ids as $id) {
            $contrato = Contrato::with('cliente')
                ->with('cliente.dependentes')
                ->with('plano')
                ->with('conta')
                ->find($id);

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contrato $contrato
     * @return string
     * @throws AuthorizationException
     */
    public function boleto(Contrato $contrato)
    {
        $this->authorize('admin.contrato.edit', $contrato);

        $contrato = Contrato::with('cliente')
            ->with('cliente.dependentes')
            ->with('plano')
            ->with('conta')
            ->with('parcelas')
            ->find($contrato->id);

        if ($contrato->tipo_pagamento === '1') {
            $contrato['tipo_pagamento'] = array('nome' => 'Boleto', 'id' => 1);
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['tipo_pagamento'] = array('nome' => 'Carnê', 'id' => 2);
        }

        $beneficiario = new Pessoa([
            'documento' => $contrato->conta->cpf_cnpj,
            'nome' => $contrato->conta->nome,
            'cep' => '15700-068',
            'endereco' => 'Rua 10 n. 2740',
            'bairro' => 'Centro',
            'uf' => 'SP',
            'cidade' => 'Jales',
        ]);

        $pagador = new Pessoa([
            'documento' => $contrato->cliente->tipo === 1 ? $contrato->cliente->cnpj : $contrato->cliente->cpf,
            'nome' => $contrato->cliente->tipo === 1 ? $contrato->cliente->razao_social : $contrato->cliente->nome,
            'cep' => $contrato->cliente->cep,
            'endereco' => $contrato->cliente->logradouro,
            'bairro' => $contrato->cliente->bairro,
            'uf' => $contrato->cliente->uf->abreviacao,
            'cidade' => $contrato->cliente->cidade->nome,
        ]);

        $pdf = new \Eduardokum\LaravelBoleto\Boleto\Render\Pdf();

        foreach ($contrato->parcelas as $key => $parcela) {
            if ($contrato->conta->banco === '237') {
                $boleto = new Bradesco([
                    'logo' => 'images/237.png',
                    'dataVencimento' => new Carbon($parcela['vencimento']),
                    'valor' => $parcela->valor,
                    'numero' => 1,
                    'numeroDocumento' => 1,
                    'pagador' => $pagador,
                    'beneficiario' => $beneficiario,
                    'carteira' => $contrato->conta->carteira,
                    'agencia' => $contrato->conta->agencia . '-' . $contrato->conta->digito_agencia,
                    'conta' => $contrato->conta->conta . '-' . $contrato->conta->digito_conta,
                    'multa' => $contrato->multa, // 1% do valor do boleto após o vencimento
                    'juros' => $contrato->juros, // 1% ao mês do valor do boleto
                    'jurosApos' => 0, // quant. de dias para começar a cobrança de juros,
                    //'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
                    'instrucoes' => [
                        'DESCONTO DE R$ ' . $contrato->desconto . ' ATÉ O VENCIMENTO',
                        'VENCIDO, COBRAR MULTA DE ' . $contrato->multa . ' + JUROS DE ' . $contrato->juros . ' MÊS',
                        $contrato->conta->mensagem_1,
                        $contrato->conta->mensagem_2,
                    ],
                    'aceite' => 'S',
                    'especieDoc' => 'DM',
                ]);
                $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Bradesco(
                    [
                        'idRemessa' => 1,
                        'beneficiario' => $beneficiario,
                        'agencia' => $contrato->conta->agencia . '-' . $contrato->conta->digito_agencia,
                        'conta' => $contrato->conta->conta,
                        'contaDv' => $contrato->conta->digito_conta,
                        'carteira' => $contrato->conta->carteira,
                        'codigoCliente' => '12345678901234567890',
                    ]
                );
            }

            if ($contrato->conta->banco === '748') {
                $boleto = new Sicredi([
                    'logo' => 'images/748.png',
                    'dataVencimento' => new Carbon($parcela['vencimento']),
                    'valor' => $parcela->valor,
                    'numero' => 1,
                    'numeroDocumento' => 1,
                    'pagador' => $pagador,
                    'beneficiario' => $beneficiario,
                    'carteira' => $contrato->conta->carteira,
                    'posto' => 11,
                    'byte' => 2,
                    'agencia' => $contrato->conta->agencia . '-' . $contrato->conta->digito_agencia,
                    'conta' => $contrato->conta->conta . '-' . $contrato->conta->digito_conta,
                    'multa' => $contrato->multa, // 1% do valor do boleto após o vencimento
                    'juros' => $contrato->juros, // 1% ao mês do valor do boleto
                    'jurosApos' => 0, // quant. de dias para começar a cobrança de juros,
                    //'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
                    'instrucoes' => [
                        'DESCONTO DE R$ ' . $contrato->desconto . ' ATÉ O VENCIMENTO',
                        'VENCIDO, COBRAR MULTA DE ' . $contrato->multa . ' + JUROS DE ' . $contrato->juros . ' MÊS',
                        $contrato->conta->mensagem_1,
                        $contrato->conta->mensagem_2,
                    ],
                    'aceite' => 'S',
                    'especieDoc' => 'DM',
                ]);
                $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Sicredi(
                    [
                        'idremessa' => 1,
                        'beneficiario' => $beneficiario,
                        'agencia' => $contrato->conta->agencia . '-' . $contrato->conta->digito_agencia,
                        'conta' => $contrato->conta->conta,
                        'carteira' => $contrato->conta->carteira,
                    ]
                );
            }

            // Add as many bills as you want.
            $pdf->addBoleto($boleto);
            // Add multiples bill to a send object. Here need a array of instances of Boleto.
            $remessa->addBoleto($boleto);
        }

        // If you want to hide the print instructions.
        $pdf->hideInstrucoes();

        // To Render
        //$pdf->gerarBoleto();

        // Return a string of file.
        // It depends on the instance, 240 or 400 positions.
        $remessa->gerar();

        // Saves the string to a file on the disk whose path was passed in $path argument.
        $remessa->save(public_path('remessas' . DIRECTORY_SEPARATOR . 'remessa.txt'));

        // Force file download.
        // If you pass the $filename argument it overwrites the name in the download.
        return $remessa->download($filename = null);
    }
}
