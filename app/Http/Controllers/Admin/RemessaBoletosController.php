<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RemessaBoleto\BulkDestroyRemessaBoleto;
use App\Http\Requests\Admin\RemessaBoleto\DestroyRemessaBoleto;
use App\Http\Requests\Admin\RemessaBoleto\IndexRemessaBoleto;
use App\Http\Requests\Admin\RemessaBoleto\StoreRemessaBoleto;
use App\Http\Requests\Admin\RemessaBoleto\UpdateRemessaBoleto;
use App\Models\RemessaBoleto;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RemessaBoletosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexRemessaBoleto $request
     * @return array|Factory|View
     */
    public function index(IndexRemessaBoleto $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(RemessaBoleto::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'id_boleto', 'id_remessa'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id'),
                ];
            }

            return ['data' => $data];
        }

        return view('admin.remessa-boleto.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.remessa-boleto.create');

        return view('admin.remessa-boleto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRemessaBoleto $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRemessaBoleto $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the RemessaBoleto
        $remessaBoleto = RemessaBoleto::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/remessa-boletos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/remessa-boletos');
    }

    /**
     * Display the specified resource.
     *
     * @param RemessaBoleto $remessaBoleto
     * @throws AuthorizationException
     * @return void
     */
    public function show(RemessaBoleto $remessaBoleto)
    {
        $this->authorize('admin.remessa-boleto.show', $remessaBoleto);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RemessaBoleto $remessaBoleto
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(RemessaBoleto $remessaBoleto)
    {
        $this->authorize('admin.remessa-boleto.edit', $remessaBoleto);

        return view('admin.remessa-boleto.edit', [
            'remessaBoleto' => $remessaBoleto,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRemessaBoleto $request
     * @param RemessaBoleto $remessaBoleto
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRemessaBoleto $request, RemessaBoleto $remessaBoleto)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values RemessaBoleto
        $remessaBoleto->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/remessa-boletos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/remessa-boletos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRemessaBoleto $request
     * @param RemessaBoleto $remessaBoleto
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRemessaBoleto $request, RemessaBoleto $remessaBoleto)
    {
        $remessaBoleto->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRemessaBoleto $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRemessaBoleto $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    RemessaBoleto::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
