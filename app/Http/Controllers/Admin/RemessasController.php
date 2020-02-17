<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Remessa\BulkDestroyRemessa;
use App\Http\Requests\Admin\Remessa\DestroyRemessa;
use App\Http\Requests\Admin\Remessa\IndexRemessa;
use App\Http\Requests\Admin\Remessa\StoreRemessa;
use App\Http\Requests\Admin\Remessa\UpdateRemessa;
use App\Models\Remessa;
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

class RemessasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexRemessa $request
     * @return array|Factory|View
     */
    public function index(IndexRemessa $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Remessa::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'data', 'id_usuario', 'nome', 'sequencia', 'id_conta'],

            // set columns to searchIn
            ['id', 'nome']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.remessa.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.remessa.create');

        return view('admin.remessa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRemessa $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRemessa $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Remessa
        $remessa = Remessa::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/remessas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/remessas');
    }

    /**
     * Display the specified resource.
     *
     * @param Remessa $remessa
     * @throws AuthorizationException
     * @return void
     */
    public function show(Remessa $remessa)
    {
        $this->authorize('admin.remessa.show', $remessa);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Remessa $remessa
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Remessa $remessa)
    {
        $this->authorize('admin.remessa.edit', $remessa);


        return view('admin.remessa.edit', [
            'remessa' => $remessa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRemessa $request
     * @param Remessa $remessa
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateRemessa $request, Remessa $remessa)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Remessa
        $remessa->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/remessas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/remessas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyRemessa $request
     * @param Remessa $remessa
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyRemessa $request, Remessa $remessa)
    {
        $remessa->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyRemessa $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyRemessa $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Remessa::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Remessa $remessa
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function remessa(Remessa $remessa)
    {
        $this->authorize('admin.remessa.edit', $remessa);

        return view('admin.remessa.edit', [
            'remessa' => $remessa,
        ]);
    }

}
