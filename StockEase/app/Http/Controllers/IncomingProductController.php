<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\IncomingProduct;
use Illuminate\Http\Request;

class IncomingProductController extends Controller
{
    public function index()
    {
        $incomingProducts = IncomingProduct::with('product')
            ->latest()
            ->paginate(10);

        return view('incoming-products.index', compact('incomingProducts'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('incoming-products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty'        => 'required|integer|min:1',
            'date'       => 'required|date',
            'supplier'   => 'nullable|string|max:255',
            'note'       => 'nullable|string',
        ]);

        IncomingProduct::create($request->all());

        $product = Product::findOrFail($request->product_id);

        $product->increment('stock', $request->qty);

        return redirect()
            ->route('incoming-products.index')
            ->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}