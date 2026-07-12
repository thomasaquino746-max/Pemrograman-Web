<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutgoingProductController;
use App\Http\Controllers\IncomingProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::get('/reports/incoming/pdf', [ReportController::class, 'incomingPdf'])
    ->name('reports.incoming.pdf');

Route::get('/reports/incoming/excel', [ReportController::class, 'incomingExcel'])
    ->name('reports.incoming.excel');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('outgoing-products', OutgoingProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('incoming-products', IncomingProductController::class);
    Route::get('/reports/incoming', [ReportController::class, 'incoming'])
    ->name('reports.incoming');
});

require __DIR__.'/auth.php';
