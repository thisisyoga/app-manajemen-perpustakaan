<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin-dashboard', function () {
    return view('admin.index');
})->name('admin-dashboard');

Route::get('/admin-MDA', function () {
    return view('admin.akun.index');
})->name('MDA');

Route::get('/admin-MDA-create', function () {
    return view('admin.akun.create');
})->name('create-MDA');

Route::get('/member-dashboard', function () {
    return view('user.index');
})->name('create-MDA');

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

require __DIR__.'/auth.php';
