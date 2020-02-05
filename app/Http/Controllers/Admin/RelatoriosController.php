<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Parcela;
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
     * @param Request $request
     * @return string
     * @throws ValidationException
     */
    public function export(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'inicio' => ['required', 'date'],
            'fim' => ['required', 'date'],
        ]);

        // Sanitize input
        $sanitized = $request->only([
            'inicio',
            'fim',
        ]);

        $parcelas = Parcela::whereBetween('vencimento', [$sanitized['inicio'], $sanitized['fim']])
            ->whereNull('pagamento')
            ->get();

        $pdf = PDF::loadView('pdf.relatorio',
            [
                'data' => $parcelas,
                'inicio' => $sanitized['inicio'],
                'fim' => $sanitized['fim']
            ]
        );

        return $pdf->download('relatorio.pdf');
    }
}
