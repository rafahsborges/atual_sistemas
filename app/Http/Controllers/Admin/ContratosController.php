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
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use PDF;
use ZipArchive;

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
                    'bulkItems' => $data->pluck('id'),
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
                $parcelas[] = [
                    'vencimento' => $vencimento_parcela->addMonths($i)->toDateString(),
                    'valor' => $valor_parcela,
                    'numero_parcela' => $i + 1,
                    'id_contrato' => $contrato->id,
                    'enabled' => true,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
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
            $contrato->tipo_pagamento = ['nome' => 'Boleto', 'id' => 1];
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato->tipo_pagamento = ['nome' => 'Carnê', 'id' => 2];
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
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s'),
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
            $contrato['pagamento'] = ['nome' => 'Boleto', 'id' => 1];
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['pagamento'] = ['nome' => 'Carnê', 'id' => 2];
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
                $contrato['pagamento'] = ['nome' => 'Boleto', 'id' => 1];
            }

            if ($contrato->tipo_pagamento === '2') {
                $contrato['pagamento'] = ['nome' => 'Carnê', 'id' => 2];
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
                'carteiras' => $contratos,
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
            $contrato['tipo_pagamento'] = ['nome' => 'Boleto', 'id' => 1];
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['tipo_pagamento'] = ['nome' => 'Carnê', 'id' => 2];
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

        $boletos = [];

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
                    'agencia' => $contrato->conta->agencia.'-'.$contrato->conta->digito_agencia,
                    'conta' => $contrato->conta->conta.'-'.$contrato->conta->digito_conta,
                    'multa' => $contrato->multa, // 1% do valor do boleto após o vencimento
                    'juros' => $contrato->juros, // 1% ao mês do valor do boleto
                    'jurosApos' => 0, // quant. de dias para começar a cobrança de juros,
                    //'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
                    'instrucoes' => [
                        'DESCONTO DE R$ '.$contrato->desconto.' ATÉ O VENCIMENTO',
                        'VENCIDO, COBRAR MULTA DE '.$contrato->multa.' + JUROS DE '.$contrato->juros.' MÊS',
                        $contrato->conta->mensagem_1,
                        $contrato->conta->mensagem_2,
                    ],
                    'aceite' => 'S',
                    'especieDoc' => 'DM',
                ]);
                $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Bradesco(
                    [
                        'idRemessa' => $key,
                        'beneficiario' => $beneficiario,
                        'agencia' => $contrato->conta->agencia.'-'.$contrato->conta->digito_agencia,
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
                    'agencia' => $contrato->conta->agencia.'-'.$contrato->conta->digito_agencia,
                    'conta' => $contrato->conta->conta.'-'.$contrato->conta->digito_conta,
                    'multa' => $contrato->multa, // 1% do valor do boleto após o vencimento
                    'juros' => $contrato->juros, // 1% ao mês do valor do boleto
                    'jurosApos' => 0, // quant. de dias para começar a cobrança de juros,
                    //'descricaoDemonstrativo' => ['demonstrativo 1', 'demonstrativo 2', 'demonstrativo 3'],
                    'instrucoes' => [
                        'DESCONTO DE R$ '.$contrato->desconto.' ATÉ O VENCIMENTO',
                        'VENCIDO, COBRAR MULTA DE '.$contrato->multa.' + JUROS DE '.$contrato->juros.' MÊS',
                        $contrato->conta->mensagem_1,
                        $contrato->conta->mensagem_2,
                    ],
                    'aceite' => 'S',
                    'especieDoc' => 'DM',
                ]);
            }

            // Add as many bills as you want.
            $pdf->addBoleto($boleto);
            $boletos[] = $boleto;
        }

        if ($contrato->conta->banco === '237') {
            $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Bradesco(
                [
                    'idRemessa' => 1,
                    'beneficiario' => $beneficiario,
                    'agencia' => $contrato->conta->agencia.'-'.$contrato->conta->digito_agencia,
                    'conta' => $contrato->conta->conta,
                    'contaDv' => $contrato->conta->digito_conta,
                    'carteira' => $contrato->conta->carteira,
                    'codigoCliente' => '12345678901234567890',
                ]
            );
        }

        if ($contrato->conta->banco === '748') {
            $remessa = new \Eduardokum\LaravelBoleto\Cnab\Remessa\Cnab400\Banco\Sicredi(
                [
                    'idremessa' => 1,
                    'beneficiario' => $beneficiario,
                    'agencia' => $contrato->conta->agencia.'-'.$contrato->conta->digito_agencia,
                    'conta' => $contrato->conta->conta,
                    'carteira' => $contrato->conta->carteira,
                ]
            );
        }

        // Add multiples bill to a send object. Here need a array of instances of Boleto.
        $remessa->addBoletos($boletos);

        // If you want to hide the print instructions.
        $pdf->hideInstrucoes();

        // To Render
        $pdf->gerarBoleto();

        // Return a string of file.
        // It depends on the instance, 240 or 400 positions.
        $remessa->gerar();

        // Saves the string to a file on the disk whose path was passed in $path argument.
        $remessa->save(public_path('remessas'.DIRECTORY_SEPARATOR.'remessa.txt'));

        // Force file download.
        // If you pass the $filename argument it overwrites the name in the download.
        return $remessa->download($filename = null);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contrato $contrato
     * @return string
     * @throws AuthorizationException
     */
    public function titulo(Contrato $contrato)
    {
        $this->authorize('admin.contrato.edit', $contrato);

        $contrato = Contrato::with('cliente')
            ->with('cliente.dependentes')
            ->with('plano')
            ->with('conta')
            ->with('parcelas')
            ->find($contrato->id);

        if ($contrato->tipo_pagamento === '1') {
            $contrato['tipo_pagamento'] = ['nome' => 'Boleto', 'id' => 1];
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['tipo_pagamento'] = ['nome' => 'Carnê', 'id' => 2];
        }

        $content = '';
        $nossonumero = '100';
        foreach ($contrato->parcelas as $key => $parcela) {
            $nome = $contrato->cliente->tipo === 1 ? $contrato->cliente->razao_social : $contrato->cliente->nome;
            $cpfcnpj = $contrato->cliente->tipo === 1 ? $contrato->cliente->cnpj : $contrato->cliente->cpf;
            $numero = ($key + 1 < 10) ? '0'.($key + 1) : $key + 1;
            $content .= '[Titulo'.$numero.']';
            $content .= "\n";
            $content .= 'LocalPagamento=Ate o Vcto em qualquer banco ou correspondente.';
            $content .= "\n";
            $content .= 'NumeroDocumento=ABC234';
            $content .= "\n";
            $content .= 'NossoNumero='.$nossonumero++;
            $content .= "\n";
            $content .= 'Carteira='.$contrato->conta->carteira;
            $content .= "\n";
            $content .= 'ValorDocumento='.$parcela->valor;
            $content .= "\n";
            $content .= 'ValorMoraJuros='.$contrato->juros;
            $content .= "\n";
            $content .= 'Vencimento='.(new Carbon($parcela['vencimento']))->format('d/m/Y');
            $content .= "\n";
            $content .= 'Sacado.NomeSacado='.$nome;
            $content .= "\n";
            $content .= 'Sacado.CNPJCPF='.$cpfcnpj;
            $content .= "\n";
            $content .= 'Sacado.Pessoa='.$contrato->cliente->tipo;
            $content .= "\n";
            $content .= 'Sacado.Logradouro='.$contrato->cliente->logradouro;
            $content .= "\n";
            $content .= 'Sacado.Numero='.$contrato->cliente->numero;
            $content .= "\n";
            $content .= 'Sacado.Bairro='.$contrato->cliente->bairro;
            $content .= "\n";
            $content .= 'Sacado.Cidade='.$contrato->cliente->cidade->nome;
            $content .= "\n";
            $content .= 'Sacado.UF='.$contrato->cliente->uf->abreviacao;
            $content .= "\n";
            $content .= 'Sacado.CEP='.$contrato->cliente->cep;
            $content .= "\n";
            $content .= 'Sacado.Email='.$contrato->cliente->email;
            $content .= "\n";
            $content .= 'Mensagem=DESCONTO DE R$ '.$contrato->desconto.' ATÉ O VENCIMENTO';
            $content .= '|';
            $content .= 'VENCIDO, COBRAR MULTA DE '.$contrato->multa.' + JUROS DE '.$contrato->juros.' MÊS';
            $content .= '|';
            $content .= $contrato->conta->mensagem_1;
            $content .= '|';
            $content .= $contrato->conta->mensagem_1;
            $content .= '|';
            $content .= "\n";
        }

        Storage::put('titulos.ini', $content);

        return Storage::download('titulos.ini');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contrato $contrato
     * @return string
     * @throws AuthorizationException
     */
    public function carne(Contrato $contrato)
    {
        $this->authorize('admin.contrato.edit', $contrato);

        $contrato = Contrato::with('cliente')
            ->with('cliente.dependentes')
            ->with('plano')
            ->with('conta')
            ->with('parcelas')
            ->find($contrato->id);

        if ($contrato->tipo_pagamento === '1') {
            $contrato['tipo_pagamento'] = ['nome' => 'Boleto', 'id' => 1];
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['tipo_pagamento'] = ['nome' => 'Carnê', 'id' => 2];
        }

        $obs = 'DESCONTO DE R$ '.$contrato->desconto.' ATÉ O VENCIMENTO';
        $obs .= "\n";
        $obs .= 'VENCIDO, COBRAR MULTA DE '.$contrato->multa.'% + JUROS DE '.$contrato->juros.'% MÊS';
        $obs .= "\n";
        $obs .= 'NÃO RECEBER COM 60 DIAS DE VENCIDO';
        $obs .= "\n";
        $obs .= 'PROTESTAR EM 5 DIAS UTEIS';

        $pdf = PDF::loadView('pdf.carne',
            [
                'nome_empresa' => 'ESSENCIAL VIDA COB. CADASTRO LTDA. ME',
                'endereco_empresa' => 'Rua 10 n. 2740, Centro, Jales - SP - CEP: 15700-068',
                'tel_empresa' => '',
                'logo' => '',
                'obs' => $obs,
                'nome' => $contrato->cliente->nome,
                'endereco' => $contrato->cliente->logradouro.', '.$contrato->cliente->complemento.', '.$contrato->cliente->bairro.', '.$contrato->cliente->cidade->nome.', '.$contrato->cliente->uf->abreviacao,
                'cpf' => $contrato->cliente->cpf,
                'valor' => $contrato->valor_parcela,
                'qtd' => $contrato->qtd_parcelas,
                'vence' => Carbon::createFromFormat('Y-m-d H:i:s', $contrato->primeira_parcela)->day,
                'primeiro_mes' => Carbon::createFromFormat('Y-m-d H:i:s', $contrato->primeira_parcela)->month,
                'primeiro_ano' => Carbon::createFromFormat('Y-m-d H:i:s', $contrato->primeira_parcela)->year,
                'hoje' => Carbon::now()->format('d/m/Y'),
            ]
        );

        return $pdf->download('carne.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contrato $contrato
     * @return string
     * @throws AuthorizationException
     */
    public function titulo2(Contrato $contrato)
    {
        $this->authorize('admin.contrato.edit', $contrato);

        $contrato = Contrato::with('cliente')
            ->with('cliente.dependentes')
            ->with('plano')
            ->with('conta')
            ->with('parcelas')
            ->find($contrato->id);

        if ($contrato->tipo_pagamento === '1') {
            $contrato['tipo_pagamento'] = ['nome' => 'Boleto', 'id' => 1];
        }

        if ($contrato->tipo_pagamento === '2') {
            $contrato['tipo_pagamento'] = ['nome' => 'Carnê', 'id' => 2];
        }

        $content = '';
        $content2 = '';
        $content3 = '';
        $nossonumero = '100';
        foreach ($contrato->parcelas as $key => $parcela) {
            $nome = $contrato->cliente->tipo === 1 ? $contrato->cliente->razao_social : $contrato->cliente->nome;
            $cpfcnpj = $contrato->cliente->tipo === 1 ? $contrato->cliente->cnpj : $contrato->cliente->cpf;
            $numero = ($key + 1 < 10) ? '0'.($key + 1) : $key + 1;
            $content .= '[Titulo'.$numero.']';
            $content .= "\n";
            $content .= 'LocalPagamento=Ate o Vcto em qualquer banco ou correspondente.';
            $content .= "\n";
            $content .= 'NumeroDocumento=ABC234';
            $content .= "\n";
            $content .= 'NossoNumero='.$nossonumero++;
            $content .= "\n";
            $content .= 'Carteira='.$contrato->conta->carteira;
            $content .= "\n";
            $content .= 'ValorDocumento='.$parcela->valor;
            $content .= "\n";
            $content .= 'ValorMoraJuros='.$contrato->juros;
            $content .= "\n";
            $content .= 'Vencimento='.(new Carbon($parcela['vencimento']))->format('d/m/Y');
            $content .= "\n";
            $content .= 'Sacado.NomeSacado='.$nome;
            $content .= "\n";
            $content .= 'Sacado.CNPJCPF='.$cpfcnpj;
            $content .= "\n";
            $content .= 'Sacado.Pessoa='.$contrato->cliente->tipo;
            $content .= "\n";
            $content .= 'Sacado.Logradouro='.$contrato->cliente->logradouro;
            $content .= "\n";
            $content .= 'Sacado.Numero='.$contrato->cliente->numero;
            $content .= "\n";
            $content .= 'Sacado.Bairro='.$contrato->cliente->bairro;
            $content .= "\n";
            $content .= 'Sacado.Cidade='.$contrato->cliente->cidade->nome;
            $content .= "\n";
            $content .= 'Sacado.UF='.$contrato->cliente->uf->abreviacao;
            $content .= "\n";
            $content .= 'Sacado.CEP='.$contrato->cliente->cep;
            $content .= "\n";
            $content .= 'Sacado.Email='.$contrato->cliente->email;
            $content .= "\n";
            $content .= 'Mensagem=DESCONTO DE R$ '.$contrato->desconto.' ATÉ O VENCIMENTO';
            $content .= '|';
            $content .= 'VENCIDO, COBRAR MULTA DE '.$contrato->multa.' + JUROS DE '.$contrato->juros.' MÊS';
            $content .= '|';
            $content .= $contrato->conta->mensagem_1;
            $content .= '|';
            $content .= $contrato->conta->mensagem_1;
            $content .= '|';
            $content .= "\n";
        }

        $content2 .= '//envia email';
        $content2 .= "\n";
        $content2 .= 'BOLETO.ConfigurarDados("C:\ACBrNfeMonitor\cedente.ini")';
        $content2 .= "\n";
        $content2 .= 'BOLETO.LimparLista    //antes de criar novos títulos, apagues os existentes,';
        $content2 .= "\n";
        $content2 .= 'BOLETO.IncluirTitulos("C:\ACBrNfeMonitor\titulos.ini","E")   //inclui e envia email';
        $content2 .= "\n";
        $content2 .= 'BOLETO.LimparLista    //limpa a lista';
        $content2 .= "\n";
        $content2 .= '//';
        $content2 .= "\n";
        $content2 .= 'BOLETO.ConfigurarDados("C:\ACBrNfeMonitor\cedente.ini")';
        $content2 .= "\n";
        $content2 .= 'BOLETO.LimparLista    //antes de criar novos títulos, apagues os existentes,';
        $content2 .= "\n";
        $content2 .= 'BOLETO.IncluirTitulos("C:\ACBrNfeMonitor\titulos.ini","I")   //inclui e imprime ';
        $content2 .= "\n";
        $content2 .= 'BOLETO.LimparLista    //limpa a lista';
        $content2 .= "\n";
        $content2 .= '//';
        $content2 .= "\n";
        $content2 .= 'BOLETO.ConfigurarDados("C:\ACBrNfeMonitor\cedente.ini")';
        $content2 .= "\n";
        $content2 .= 'BOLETO.LimparLista    //antes de criar novos títulos, apagues os existentes,';
        $content2 .= "\n";
        $content2 .= 'BOLETO.IncluirTitulos("C:\ACBrNfeMonitor\titulos.ini")';
        $content2 .= "\n";
        $content2 .= 'BOLETO.GerarRemessa("C:\Atual_Cuidado\Cobranca\Remessa\",,ARQREM_2020_02_07_16_528_01.REM)';
        $content2 .= "\n";
        $content2 .= 'BOLETO.LimparLista    //limpa a lista';

        $content3 .= '[Cedente]';
        $content3 .= "\n";
        $content3 .= 'Nome=AtualxxxSistemas-Leandro R.H.Costa';
        $content3 .= "\n";
        $content3 .= 'CNPJCPF=184.567.548-70';
        $content3 .= "\n";
        $content3 .= 'Logradouro=Rua 24';
        $content3 .= "\n";
        $content3 .= 'Numero=2779';
        $content3 .= "\n";
        $content3 .= 'Bairro=JD.Paulo VI';
        $content3 .= "\n";
        $content3 .= 'Cidade=Jales';
        $content3 .= "\n";
        $content3 .= 'CEP=15706400';
        $content3 .= "\n";
        $content3 .= 'Complemento=';
        $content3 .= "\n";
        $content3 .= 'UF=SP';
        $content3 .= "\n";
        $content3 .= 'RespEmis=0';
        $content3 .= "\n";
        $content3 .= 'TipoPessoa=0';
        $content3 .= "\n";
        $content3 .= 'CodigoCedente=096895';
        $content3 .= "\n";
        $content3 .= '[Conta]';
        $content3 .= "\n";
        $content3 .= 'Conta='.$contrato->conta->conta;
        $content3 .= "\n";
        $content3 .= 'DigitoConta='.$contrato->conta->digito_conta;
        $content3 .= "\n";
        $content3 .= 'Agencia='.$contrato->conta->agencia;
        $content3 .= "\n";
        $content3 .= 'DigitoAgencia='.$contrato->conta->digito_agencia;
        $content3 .= "\n";
        $content3 .= '[banco]';
        $content3 .= "\n";
        $content3 .= 'Numero='.$contrato->conta->banco;
        $content3 .= "\n";
        $content3 .= 'CNAB=1';
        $content3 .= "\n";
        $content3 .= 'IndiceACBr=3';
        $content3 .= "\n";

        /*var_dump('<pre>');
        var_dump($contrato->conta->banco);
        var_dump('</pre>');
        die();*/

        Storage::put('titulos.ini', $content);
        Storage::put('ent.txt', $content2);
        Storage::put('cedente.ini', $content3);

        $zip_file = 'boletos.zip';
        $zip = new ZipArchive();
        $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);
        $zip->addFromString('titulos.ini', $content);
        $zip->addFromString('ent.txt', $content2);
        $zip->addFromString('cedente.ini', $content3);
        $zip->close();

        return Storage::download('boletos.zip');
    }
}
