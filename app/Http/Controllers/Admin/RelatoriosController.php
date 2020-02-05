<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Relatorio\BulkDestroyRelatorio;
use App\Http\Requests\Admin\Relatorio\DestroyRelatorio;
use App\Http\Requests\Admin\Relatorio\IndexRelatorio;
use App\Http\Requests\Admin\Relatorio\StoreRelatorio;
use App\Http\Requests\Admin\Relatorio\UpdateRelatorio;
use App\Models\Contrato;
use App\Models\Relatorio;
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

class RelatoriosController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRelatorio $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreRelatorio $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();
        $sanitized['id_contrato'] = $request->getContratoId();

        // Store the Relatorio
        $parcela = Relatorio::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/parcelas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/parcelas');
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
