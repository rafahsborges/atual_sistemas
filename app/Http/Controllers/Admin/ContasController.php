<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Conta\BulkDestroyConta;
use App\Http\Requests\Admin\Conta\DestroyConta;
use App\Http\Requests\Admin\Conta\IndexConta;
use App\Http\Requests\Admin\Conta\StoreConta;
use App\Http\Requests\Admin\Conta\UpdateConta;
use App\Models\Conta;
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

class ContasController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexConta $request
     * @return array|Factory|View
     */
    public function index(IndexConta $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Conta::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nome', 'banco', 'agencia', 'digito_agencia', 'conta', 'digito_conta', 'codigo_empresa', 'carteira', 'tipo', 'mensagem_1', 'mensagem_2', 'cpf_cnpj', 'enabled'],

            // set columns to searchIn
            ['id', 'nome', 'banco', 'digito_agencia', 'digito_conta', 'codigo_empresa', 'mensagem_1', 'mensagem_2', 'cpf_cnpj']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.conta.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.conta.create');

        return view('admin.conta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreConta $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreConta $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Conta
        $contum = Conta::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/contas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/contas');
    }

    /**
     * Display the specified resource.
     *
     * @param Conta $contum
     * @throws AuthorizationException
     * @return void
     */
    public function show(Conta $contum)
    {
        $this->authorize('admin.conta.show', $contum);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Conta $contum
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Conta $contum)
    {
        $this->authorize('admin.conta.edit', $contum);


        return view('admin.conta.edit', [
            'contum' => $contum,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateConta $request
     * @param Conta $contum
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateConta $request, Conta $contum)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Conta
        $contum->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/contas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/contas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyConta $request
     * @param Conta $contum
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyConta $request, Conta $contum)
    {
        $contum->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyConta $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyConta $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    DB::table('conta')->whereIn('id', $bulkChunk)
                        ->update([
                            'deleted_at' => Carbon::now()->format('Y-m-d H:i:s')
                    ]);

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
