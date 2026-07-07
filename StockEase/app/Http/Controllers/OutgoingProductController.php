<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\OutgoingProduct;
use Illuminate\Http\Request;

class OutgoingProductController extends Controller
{
    public function index()
    {
        $outgoingProducts = OutgoingProduct::with('product')
            ->latest()
            ->paginate(10);

        return view('outgoing-products.index', compact('outgoingProducts'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('outgoing-products.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1',
            'date' => 'required|date',
            'customer' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->qty > $product->stock) {
            return back()
                ->withInput()
                ->withErrors([
                    'qty' => 'Stok tidak mencukupi.'
                ]);
        }

        OutgoingProduct::create($request->all());

        $product->decrement('stock', $request->qty);

        return redirect()
            ->route('outgoing-products.index')
            ->with('success', 'Barang keluar berhasil ditambahkan.');
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