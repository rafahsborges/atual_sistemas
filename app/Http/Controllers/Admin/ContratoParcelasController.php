<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContratoParcela\BulkDestroyContratoParcela;
use App\Http\Requests\Admin\ContratoParcela\DestroyContratoParcela;
use App\Http\Requests\Admin\ContratoParcela\IndexContratoParcela;
use App\Http\Requests\Admin\ContratoParcela\StoreContratoParcela;
use App\Http\Requests\Admin\ContratoParcela\UpdateContratoParcela;
use App\Models\ContratoParcela;
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

class ContratoParcelasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexContratoParcela $request
     * @return array|Factory|View
     */
    public function index(IndexContratoParcela $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ContratoParcela::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'vencimento', 'pagamento', 'id_boleto', 'id_carne', 'valor', 'numero_parcela', 'valor_pagamento', 'id_contrato', 'enabled'],

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

        return view('admin.contrato-parcela.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.contrato-parcela.create');

        return view('admin.contrato-parcela.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContratoParcela $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreContratoParcela $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ContratoParcela
        $contratoParcela = ContratoParcela::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contrato-parcelas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contrato-parcelas');
    }

    /**
     * Display the specified resource.
     *
     * @param ContratoParcela $contratoParcela
     * @throws AuthorizationException
     * @return void
     */
    public function show(ContratoParcela $contratoParcela)
    {
        $this->authorize('admin.contrato-parcela.show', $contratoParcela);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ContratoParcela $contratoParcela
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ContratoParcela $contratoParcela)
    {
        $this->authorize('admin.contrato-parcela.edit', $contratoParcela);


        return view('admin.contrato-parcela.edit', [
            'contratoParcela' => $contratoParcela,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContratoParcela $request
     * @param ContratoParcela $contratoParcela
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateContratoParcela $request, ContratoParcela $contratoParcela)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ContratoParcela
        $contratoParcela->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/contrato-parcelas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/contrato-parcelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyContratoParcela $request
     * @param ContratoParcela $contratoParcela
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyContratoParcela $request, ContratoParcela $contratoParcela)
    {
        $contratoParcela->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyContratoParcela $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyContratoParcela $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('contratoParcelas')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
