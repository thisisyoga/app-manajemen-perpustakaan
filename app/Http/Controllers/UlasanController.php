<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    public function storeUlasan(Request $request)
{
    $request->validate([
        'buku_id' => 'required',
        'rating' => 'required|numeric|min:1|max:5',
        'ulasan' => 'required|string',
    ]);

    Ulasan::create([
        'user_id' => Auth::id(),
        'buku_id' => $request->buku_id,
        'rating' => $request->rating,
        'ulasan' => $request->ulasan,
    ]);

    return back()->with('success', 'Terima kasih atas ulasan Anda!');
}
}
