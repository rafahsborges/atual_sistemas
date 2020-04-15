<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Uf\BulkDestroyUf;
use App\Http\Requests\Admin\Uf\DestroyUf;
use App\Http\Requests\Admin\Uf\IndexUf;
use App\Http\Requests\Admin\Uf\StoreUf;
use App\Http\Requests\Admin\Uf\UpdateUf;
use App\Models\Uf;
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

class UfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param IndexUf $request
     * @return array|Factory|View
     */
    public function index(IndexUf $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Uf::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'abreviacao', 'enabled'],

            // set columns to searchIn
            ['id', 'nome', 'abreviacao']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id'),
                ];
            }

            return ['data' => $data];
        }

        return view('admin.uf.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.uf.create');

        return view('admin.uf.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUf $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreUf $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Uf
        $uf = Uf::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/ufs'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/ufs');
    }

    /**
     * Display the specified resource.
     *
     * @param Uf $uf
     * @throws AuthorizationException
     * @return void
     */
    public function show(Uf $uf)
    {
        $this->authorize('admin.uf.show', $uf);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Uf $uf
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Uf $uf)
    {
        $this->authorize('admin.uf.edit', $uf);

        return view('admin.uf.edit', [
            'uf' => $uf,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUf $request
     * @param Uf $uf
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateUf $request, Uf $uf)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Uf
        $uf->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/ufs'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/ufs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyUf $request
     * @param Uf $uf
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyUf $request, Uf $uf)
    {
        $uf->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyUf $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyUf $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('ufs')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
