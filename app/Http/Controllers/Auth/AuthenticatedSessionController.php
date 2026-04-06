<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Peminjaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): View
    {
        if ($request->is('admin/login')) {
        return view('admin.auth.login'); 
    }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(LoginRequest $request): RedirectResponse
{
    $request->authenticate();
    $request->session()->regenerate();
    
    $user = Auth::user();


    // $telat = Peminjaman::where('user_id', $user->id)
    //             ->whereIn('status', ['dipinjam','diajukan'])
    //             ->where('tanggal_pengembalian', '<', now())
    //             ->exists();

    // if ($telat) {
    //     $user->update(['status' => 'inactive']);
    //     Auth::logout();
    //     return redirect()->route('login')->withErrors([
    //         'email' => 'akun anda otomatis dibekukan karena ada buku yang telat atau belum dikembali.'
    //     ]);
    // }

    if ($user->status === 'inactive') {
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'email' => 'Akun Anda telah dibekukan. Silakan hubungi petugas perpustakaan untuk informasi lebih lanjut.',
        ]);
    }

    if ($request->is('admin/login') && $user->role === 'user') {
        Auth::logout();
        return redirect()->route('admin.login')->withErrors([
            'email' => 'Akses ditolak. Halaman ini khusus Administrator.',
        ]);
    }

    if (!$request->is('admin/login') && ($user->role === 'admin' || $user->role === 'petugas')) {
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'email' => 'Staf/Admin silakan login melalui pintu khusus.',
        ]);
    }

    if ($user->role === 'admin' || $user->role === 'petugas') {
        return redirect()->intended('/admin-dashboard');
    } 
    
    return redirect()->intended('/halaman-user');
}
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
