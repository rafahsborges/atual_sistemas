<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Parcela\BulkDestroyParcela;
use App\Http\Requests\Admin\Parcela\DestroyParcela;
use App\Http\Requests\Admin\Parcela\IndexParcela;
use App\Http\Requests\Admin\Parcela\StoreParcela;
use App\Http\Requests\Admin\Parcela\UpdateParcela;
use App\Models\Contrato;
use App\Models\Parcela;
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
use PDF;

class ParcelasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexParcela $request
     * @return array|Factory|View
     */
    public function index(IndexParcela $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Parcela::class)->processRequestAndGet(
        // pass the request with params
            $request,

            // set columns to query
            ['id', 'vencimento', 'pagamento', 'id_boleto', 'id_carne', 'valor', 'numero_parcela', 'valor_pagamento', 'id_contrato', 'enabled'],

            // set columns to searchIn
            ['id'],

            function ($query) use ($request) {
                $query->with(['contrato']);
                $query->with(['contrato.cliente']);
                if ($request->has('contratos')) {
                    $query->whereIn('id_contrato', $request->get('contratos'));
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

        return view('admin.parcela.index', [
            'data' => $data,
            'contratos' => Contrato::with('cliente')->get(),
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
        $this->authorize('admin.parcela.create');

        return view('admin.parcela.create', [
            'contratos' => Contrato::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreParcela $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreParcela $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_contrato'] = $request->getContratoId();

        // Store the Parcela
        $parcela = Parcela::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/parcelas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/parcelas');
    }

    /**
     * Display the specified resource.
     *
     * @param Parcela $parcela
     * @return void
     * @throws AuthorizationException
     */
    public function show(Parcela $parcela)
    {
        $this->authorize('admin.parcela.show', $parcela);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Parcela $parcela
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function edit(Parcela $parcela)
    {
        $this->authorize('admin.parcela.edit', $parcela);

        $parcela = Parcela::with('contrato')
            ->find($parcela->id);

        return view('admin.parcela.edit', [
            'parcela' => $parcela,
            'contratos' => Contrato::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateParcela $request
     * @param Parcela $parcela
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateParcela $request, Parcela $parcela)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_contrato'] = $request->getContratoId();

        // Update changed values Parcela
        $parcela->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/parcelas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/parcelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyParcela $request
     * @param Parcela $parcela
     * @return ResponseFactory|RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(DestroyParcela $request, Parcela $parcela)
    {
        $parcela->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyParcela $request
     * @return Response|bool
     * @throws Exception
     */
    public function bulkDestroy(BulkDestroyParcela $request): Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('parcelas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                        ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Export entities
     */
    public function export()
    {
        $data = "Olá Mundo";
        $pdf = PDF::loadView('pdf.relatorio', [
            'data' => $data,
        ]);
        return $pdf->download('relatorio.pdf');
    }
}
