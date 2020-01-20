<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Dependente\BulkDestroyDependente;
use App\Http\Requests\Admin\Dependente\DestroyDependente;
use App\Http\Requests\Admin\Dependente\IndexDependente;
use App\Http\Requests\Admin\Dependente\StoreDependente;
use App\Http\Requests\Admin\Dependente\UpdateDependente;
use App\Models\Dependente;
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

class DependentesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexDependente $request
     * @return array|Factory|View
     */
    public function index(IndexDependente $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Dependente::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'nascimento', 'id_cliente', 'id_parentesco', 'enabled'],

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

        return view('admin.dependente.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.dependente.create');

        return view('admin.dependente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreDependente $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreDependente $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Dependente
        $dependente = Dependente::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/dependentes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/dependentes');
    }

    /**
     * Display the specified resource.
     *
     * @param Dependente $dependente
     * @throws AuthorizationException
     * @return void
     */
    public function show(Dependente $dependente)
    {
        $this->authorize('admin.dependente.show', $dependente);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Dependente $dependente
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Dependente $dependente)
    {
        $this->authorize('admin.dependente.edit', $dependente);


        return view('admin.dependente.edit', [
            'dependente' => $dependente,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDependente $request
     * @param Dependente $dependente
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateDependente $request, Dependente $dependente)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Dependente
        $dependente->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/dependentes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/dependentes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyDependente $request
     * @param Dependente $dependente
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyDependente $request, Dependente $dependente)
    {
        $dependente->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyDependente $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyDependente $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('dependentes')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
