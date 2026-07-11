<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\IncomingProduct;
use App\Exports\IncomingProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function incoming(Request $request)
    {
        $query = IncomingProduct::with('product');

        if ($request->filled('start_date') && $request->filled('end_date')) {

            $query->whereBetween('date', [
                $request->start_date,
                $request->end_date
            ]);
        }

        $incomingProducts = $query
            ->latest()
            ->paginate(10);

        return view('reports.incoming', compact('incomingProducts'));
    }

    public function incomingPdf()
    {
        $incomingProducts = IncomingProduct::with('product')->get();

        $pdf = Pdf::loadView('reports.pdf-incoming', compact('incomingProducts'));

        return $pdf->download('laporan-barang-masuk.pdf');
    }

    public function incomingExcel()
    {
        return Excel::download(
            new IncomingProductsExport,
            'laporan-barang-masuk.xlsx'
        );
    }
}