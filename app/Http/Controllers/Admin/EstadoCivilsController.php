<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EstadoCivil\BulkDestroyEstadoCivil;
use App\Http\Requests\Admin\EstadoCivil\DestroyEstadoCivil;
use App\Http\Requests\Admin\EstadoCivil\IndexEstadoCivil;
use App\Http\Requests\Admin\EstadoCivil\StoreEstadoCivil;
use App\Http\Requests\Admin\EstadoCivil\UpdateEstadoCivil;
use App\Models\EstadoCivil;
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

class EstadoCivilsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexEstadoCivil $request
     * @return array|Factory|View
     */
    public function index(IndexEstadoCivil $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(EstadoCivil::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'descricao', 'enabled'],

            // set columns to searchIn
            ['id', 'descricao']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.estado-civil.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.estado-civil.create');

        return view('admin.estado-civil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEstadoCivil $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreEstadoCivil $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the EstadoCivil
        $estadoCivil = EstadoCivil::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/estado-civils'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/estado-civils');
    }

    /**
     * Display the specified resource.
     *
     * @param EstadoCivil $estadoCivil
     * @throws AuthorizationException
     * @return void
     */
    public function show(EstadoCivil $estadoCivil)
    {
        $this->authorize('admin.estado-civil.show', $estadoCivil);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EstadoCivil $estadoCivil
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(EstadoCivil $estadoCivil)
    {
        $this->authorize('admin.estado-civil.edit', $estadoCivil);


        return view('admin.estado-civil.edit', [
            'estadoCivil' => $estadoCivil,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEstadoCivil $request
     * @param EstadoCivil $estadoCivil
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateEstadoCivil $request, EstadoCivil $estadoCivil)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values EstadoCivil
        $estadoCivil->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/estado-civils'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/estado-civils');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyEstadoCivil $request
     * @param EstadoCivil $estadoCivil
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyEstadoCivil $request, EstadoCivil $estadoCivil)
    {
        $estadoCivil->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyEstadoCivil $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyEstadoCivil $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('estadoCivils')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
