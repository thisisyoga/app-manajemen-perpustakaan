<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function riwayat()
    {
        $pinjam = Peminjaman::with(['user', 'buku'])
            ->whereIn('status', ['dikembalikan','ditolak'])
            ->get();

        return view('admin.riwayat.index', compact('pinjam'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->back()->with('success', 'Data peminjaman berhasil dihapus.');
    }

    public function buktiKembali($id)
    {
        $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);

        return view('admin.riwayat.buktikembali', compact('peminjaman'));
    }
}
