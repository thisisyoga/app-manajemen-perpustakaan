<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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

    // 1. PROTEKSI: User biasa dilarang login di halaman /admin/login
    if ($request->is('admin/login') && $user->role === 'user') {
        Auth::logout();
        return redirect()->route('admin.login')->withErrors([
            'email' => 'Akses ditolak. Halaman ini khusus Administrator.',
        ]);
    }

    // 2. PROTEKSI: Admin/Petugas dilarang login di halaman /login (User)
    // Jika URL saat ini BUKAN admin/login, tapi yang login adalah admin/petugas
    if (!$request->is('admin/login') && ($user->role === 'admin' || $user->role === 'petugas')) {
        Auth::logout();
        return redirect()->route('login')->withErrors([
            'email' => 'Staf/Admin silakan login melalui pintu khusus.',
        ]);
    }

    // 3. REDIRECT: Jika lolos semua proteksi di atas
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
