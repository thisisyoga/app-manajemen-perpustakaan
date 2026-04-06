<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ulasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    
public function storeUlasan(Request $request)
{
    $request->validate([
        'buku_id' => 'required',
        'rating' => 'required|numeric|min:1|max:5',
        'ulasan' => 'required|string',
    ]);

    $userId = auth()->id();
    $bukuId = $request->buku_id;

    $pinjamTerakhir = Peminjaman::where('user_id', $userId)
        ->where('buku_id', $bukuId)
        ->latest()
        ->first();

    if (!$pinjamTerakhir) {
        return back()->with('error', 'Akses ditolak. Anda belum meminjam buku ini.');
    }

    $ulasanLama = Ulasan::where('user_id', $userId)->where('buku_id', $bukuId)->first();

    if ($ulasanLama) {
        if ($pinjamTerakhir->created_at <= $ulasanLama->updated_at) {
            return back()->with('error', 'Anda harus meminjam kembali buku ini untuk memperbarui ulasan.');
        }

        $ulasanLama->update([
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
        ]);
        return back()->with('success', 'Ulasan Anda telah diperbarui!');
    }

    Ulasan::create([
        'user_id' => $userId,
        'buku_id' => $bukuId,
        'rating' => $request->rating,
        'ulasan' => $request->ulasan,
    ]);

    return back()->with('success', 'Terima kasih atas ulasan pertama Anda!');
}

    public function updateUlasan(Request $request, $id)
{
    $request->validate([
        'rating' => 'required|numeric|min:1|max:5',
        'ulasan' => 'required|string',
    ]);

    $ulasan = Ulasan::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
    
    $ulasan->update([
        'rating' => $request->rating,
        'ulasan' => $request->ulasan,
    ]);

    return back()->with('success', 'Ulasan Anda berhasil diperbarui!');
}

    public function AdminUlasan()
    {
        $ulasanInput = request()->query('search');
        $query = ulasan::with('buku', 'user');  
        $ratingInput = request()->query('rating');

        if ($ulasanInput) {
        $query->where(function($q) use ($ulasanInput) {
            $q->searchUlasan($ulasanInput);
        });
        }

        $query->when($ratingInput, function ($q) use ($ratingInput) {
            if ($ratingInput === 'rendah') {
                $q->whereBetween('rating', [1, 2]);
            } elseif ($ratingInput === 'tinggi') {
                $q->where('rating', 5);
            }
        });

        $ulasan = $query->latest()->latest()->paginate(10)->withQueryString();

        $totalulasan = $ulasan->count();
        return view('admin.ulasan.index', compact('ulasan', 'totalulasan'));
    }

    public function deleteUlasan($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('ulasan')->with('success', 'Ulasan berhasil dihapus!');
    }
}
