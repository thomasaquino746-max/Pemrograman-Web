<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\IncomingProduct;
use App\Models\OutgoingProduct;

class DashboardController extends Controller
{
    public function index()
{
    $totalCategories = Category::count();
    $totalProducts = Product::count();
    $totalIncoming = IncomingProduct::count();
    $totalOutgoing = OutgoingProduct::count();
    $totalStock = Product::sum('stock');

    $lowStockProducts = Product::where('stock', '<=', 10)
        ->orderBy('stock')
        ->get();

    $latestIncoming = IncomingProduct::with('product')
        ->latest()
        ->take(5)
        ->get();

    $latestOutgoing = OutgoingProduct::with('product')
        ->latest()
        ->take(5)
        ->get();

    return view('dashboard', compact(
        'totalCategories',
        'totalProducts',
        'totalIncoming',
        'totalOutgoing',
        'totalStock',
        'lowStockProducts',
        'latestIncoming',
        'latestOutgoing'
    ));
}
}