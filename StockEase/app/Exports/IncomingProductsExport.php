<?php

namespace App\Exports;

use App\Models\IncomingProduct;
use Maatwebsite\Excel\Concerns\FromCollection;

class IncomingProductsExport implements FromCollection
{
    public function collection()
    {
        return IncomingProduct::with('product')->get();
    }
}