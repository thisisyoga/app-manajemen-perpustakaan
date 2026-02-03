<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/akses-ditolak', function () {
    return view('error.akses');
})->name('akses-ditolak');

Route::get('/member-dashboard', function () {
    return view('user.index');
})->name('MDU');

Route::get('/dashboard', function () {

if (auth()->user()->role == 'admin') {
    return redirect('/admin-dashboard');
}elseif (auth()->user()->role == 'user') {
    return redirect('/member-dashboard');
}else (auth()->user()->role == 'petugas');
    return redirect('/petugas-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('role:user')->group(function () {

});

Route::middleware('role:admin')->group(function () {

    Route::get('/admin-dashboard', function () {
        return view('admin.index');
    })->name('admin-dashboard');

//Master Data Akun
Route::get('/akun/petugas', [AkunController::class, 'index'])->name('MDA');
Route::get('/akun/user', [AkunController::class, 'user'])->name('data-user');
Route::get('/akun/create', [AkunController::class, 'create'])->name('create-MDA');
Route::post('/akun/store', [AkunController::class, 'store'])->name('store-MDA');
Route::get('/petugas/{id}/edit', [AkunController::class, 'edit'])->name('edit-MDA');
Route::put('/petugas/{id}', [AkunController::class, 'update'])->name('update-MDA');
Route::delete('/petugas/{id}', [AkunController::class, 'destroy'])->name('delete-MDA');

//Master Data Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('MDK');
});


require __DIR__.'/auth.php';
