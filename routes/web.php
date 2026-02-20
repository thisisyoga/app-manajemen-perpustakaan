<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/akses-ditolak', function () {
    return view('error.akses');
})->name('akses-ditolak');


Route::get('/halaman-user', [UserController::class, 'index'])->name('MDU');
Route::get('/detail-buku', [UserController::class, 'detail'])->name('detail-buku');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:user')->group(function () {

});

Route::middleware(['role:admin|petugas'])->group(function () {

    Route::get('/admin-dashboard', function () {
        return view('admin.index');
    })->name('admin-dashboard');

Route::middleware(['role:admin'])->group(function () {
        // Master Data Akun
        Route::get('/akun/petugas', [AkunController::class, 'index'])->name('MDA');
        Route::get('/akun/user', [AkunController::class, 'user'])->name('data-user');
        Route::get('/akun/create', [AkunController::class, 'create'])->name('create-MDA');
        Route::post('/akun/store', [AkunController::class, 'store'])->name('store-MDA');
        Route::get('/petugas/{id}/edit', [AkunController::class, 'edit'])->name('edit-MDA');
        Route::put('/petugas/{id}', [AkunController::class, 'update'])->name('update-MDA');
        Route::delete('/petugas/{id}', [AkunController::class, 'destroy'])->name('delete-MDA');
    });

//Master Data Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('MDK');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('create-MDK');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('store-MDK');
Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('edit-MDK');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('update-MDK');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('delete-MDK');

//Master Data Buku
Route::get('/buku', [BukuController::class, 'index'])->name('MDB');
Route::get('/buku/create', [BukuController::class, 'create'])->name('create-MDB');
Route::post('/buku/store', [BukuController::class, 'store'])->name('store-MDB');
Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('edit-MDB');
Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('update-MDB');
Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('delete-MDB');
});


require __DIR__.'/auth.php';
