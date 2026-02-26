<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('RelasiKategori')->get();
        return view('user.index',compact('buku'));
    }


public function detail(string $id)
{
    $pinjam = Buku::with('RelasiKategori')->findOrFail($id);
    return view('user.pinjam.detail', compact('pinjam'));
}

        /**
     * Show the form for creating a new resource.
     */
public function create(string $id) 
{
    $pinjam = Buku::findOrFail($id);

    return view('user.pinjam.create', compact('pinjam'));
}

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_pengembalian' => 'required|date|after:today',
        ], [
            'tanggal_pengembalian.after' => 'Tanggal pengembalian harus setelah hari ini.'
        ]);

        $sudahPinjam = Peminjaman::where('user_id', Auth::id())
            ->where('buku_id', $request->buku_id)
            ->whereIn('status', ['menunggu', 'dipinjam'])
            ->first();

        if ($sudahPinjam) {
            return redirect()->back()->with('error', 'Anda sudah mengajukan peminjaman untuk buku ini.');
        }

        Peminjaman::create([
            'user_id' => Auth::id(),
            'buku_id' => $request->buku_id,
            'tanggal_peminjaman' => now()->toDateString(),
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'status' => 'menunggu', 
        ]);

        return redirect()->route('MDU')->with('success', 'Berhasil mengajukan peminjaman. Silahkan cek status secara berkala.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
