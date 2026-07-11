<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $products = Product::with('category')
        ->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('products.index', compact('products'));
}

   public function create()
{
    $categories = Category::orderBy('name')->get();

    return view('products.create', compact('categories'));
}

   public function store(StoreProductRequest $request)
{
    Product::create($request->validated());

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan.');
}

   public function edit(Product $product)
{
    $categories = Category::orderBy('name')->get();

    return view('products.edit', compact('product', 'categories'));
}
    public function update(UpdateProductRequest $request, Product $product)
{
    $product->update($request->validated());

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil diubah.');
}

    public function destroy(Product $product)
{
    $product->delete();

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil dihapus.');
}
}