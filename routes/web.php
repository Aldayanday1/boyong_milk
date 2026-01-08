<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Models\Produk;
use Illuminate\Support\Facades\Route;

// Landing Page Route - Modern Design
Route::get('/', [ProdukController::class, 'index'])->name('landingpage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [ProdukController::class, 'dashboard'])->name('dashboard');
    Route::get('create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('store', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('edit/{produk}', [ProdukController::class, 'edit'])->name('produk.edit');
    // Route::put('update/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::put('produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    // Route::delete('delete/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    Route::delete('produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

// Detail Produk di landing page
Route::get('/produk/{id}', function ($id) {
    $produk = Produk::findOrFail($id);
    return response()->json($produk);
});

require __DIR__.'/auth.php';
