<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parcela;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use PDF;

class RelatoriosController extends Controller
{
    /**
     * Export entities
     * @param $inicio
     * @param $fim
     * @return string
     */
    public function relatorio($inicio, $fim)
    {
        $parcelas = Parcela::whereBetween('vencimento', [$inicio, $fim])
            ->whereNull('pagamento')
            ->get();

        $pdf = PDF::loadView('pdf.relatorio',
            [
                'data' => $parcelas,
                'inicio' => $inicio,
                'fim' => $fim,
            ]
        );

        return $pdf->download('relatorio.pdf');
    }
}
