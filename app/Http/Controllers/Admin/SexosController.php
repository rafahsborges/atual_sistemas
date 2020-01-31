<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sexo\BulkDestroySexo;
use App\Http\Requests\Admin\Sexo\DestroySexo;
use App\Http\Requests\Admin\Sexo\IndexSexo;
use App\Http\Requests\Admin\Sexo\StoreSexo;
use App\Http\Requests\Admin\Sexo\UpdateSexo;
use App\Models\Sexo;
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

class SexosController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSexo $request
     * @return array|Factory|View
     */
    public function index(IndexSexo $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Sexo::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'enabled'],

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

        return view('admin.sexo.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sexo.create');

        return view('admin.sexo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSexo $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSexo $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Sexo
        $sexo = Sexo::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sexos'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sexos');
    }

    /**
     * Display the specified resource.
     *
     * @param Sexo $sexo
     * @throws AuthorizationException
     * @return void
     */
    public function show(Sexo $sexo)
    {
        $this->authorize('admin.sexo.show', $sexo);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sexo $sexo
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Sexo $sexo)
    {
        $this->authorize('admin.sexo.edit', $sexo);


        return view('admin.sexo.edit', [
            'sexo' => $sexo,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSexo $request
     * @param Sexo $sexo
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSexo $request, Sexo $sexo)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Sexo
        $sexo->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sexos'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sexos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySexo $request
     * @param Sexo $sexo
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySexo $request, Sexo $sexo)
    {
        $sexo->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySexo $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySexo $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('sexos')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
