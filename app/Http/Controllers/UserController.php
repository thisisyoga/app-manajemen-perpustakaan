<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\KoleksiPribadi;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $kategoriAktif = null;
        $kategoriInput = $request->query('search_kategori');
        $bukuInput = $request->query('search');
        $query = Buku::with('RelasiKategori');

        if ($request->filled('kategori')) {
        $kategoriAktif = Kategori::find($request->kategori);

        $query->whereHas('RelasiKategori', function ($q) use ($request) {
            $q->where('kategori_id', $request->kategori);
        });
        }
        
        $koleksi = Auth::check()? Auth::user()->koleksiPribadi()->pluck('buku_id')->toArray(): [];

        $dataKategori = Kategori::when($kategoriInput, function ($query) use ($kategoriInput) {
        return $query->SearchKategori($kategoriInput);})->get();

        if ($bukuInput) {
            $query->searchBuku($bukuInput);}

        $buku = $query->get();
        return view('user.index',compact('buku', 'kategori', 'kategoriAktif', 'koleksi', 'dataKategori'));
    }


public function detail(string $id)
{
    $kategori = Kategori::all();
    $kategoriAktif = null;
    $pinjam = Buku::with('ulasans','RelasiKategori')->findOrFail($id);
    $koleksi = Auth::check()? Auth::user()->koleksiPribadi()->pluck('buku_id')->toArray(): [];
    return view('user.pinjam.detail', compact('pinjam', 'kategori', 'kategoriAktif', 'koleksi'));
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

        public function riwayat()
    {
        $riwayat = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        $totalBuku = $riwayat->count();

        return view('user.riwayat.index', compact('riwayat', 'totalBuku'));
    }

    
    public function kembalikan($id)
    {
    $peminjaman = Peminjaman::findOrFail($id);

    if ($peminjaman->user_id !== Auth::id()) {
        return redirect()->back()->with('error', 'Akses ditolak.');
    }

    $peminjaman->update([
        'status' => 'diajukan',
    ]);

    return redirect()->back()->with('success', 'Buku berhasil dikembalikan. Terima kasih!');
}

public function cetakBukti($id) {
$peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);

if ($peminjaman->user_id !== Auth::id()) {
    abort(403, 'Akses Tidak Sah');
}

return view('user.riwayat.buktipinjam', compact('peminjaman'));
}

public function cetakBuktiKembali($id) {
    $peminjaman = Peminjaman::with(['user', 'buku'])->findOrFail($id);
    
    if ($peminjaman->user_id !== Auth::id() || $peminjaman->status !== 'dikembalikan') {
        abort(403, 'Dokumen belum tersedia.');
    }

    return view('user.riwayat.buktikembali', compact('peminjaman'));
}

public function favorit()
{
    $kategori = Kategori::all();
    $kategoriAktif = null;
    $user = Auth::user();
    $koleksi = $user->koleksiPribadi()->with('buku')->get();
    $buku = Buku::whereIn('id', $koleksi->pluck('buku_id'))->get();
    $koleksi = Auth::check()? Auth::user()->koleksiPribadi()->pluck('buku_id')->toArray(): [];
    return view('user.favorit.index', compact('koleksi','buku', 'kategori', 'kategoriAktif', 'koleksi'));
}

public function koleksipribadi(Buku $buku)
{
    $user = Auth::user();

        $koleksi = KoleksiPribadi::where('user_id', $user->id)
            ->where('buku_id', $buku->id)
            ->first();

        if ($koleksi) {
            $koleksi->delete();

            return redirect()->back()->with('success', 'Bookmark berhasil dihapus')->withFragment('daftar-buku');;
        }

        KoleksiPribadi::create([
            'user_id' => $user->id,
            'buku_id' => $buku->id,
        ]);

        return redirect()->back()->with('success', 'Bookmark berhasil ditambahkan')->withFragment('daftar-buku');;
}

    public function profile(string $id)
    {
        return view('user.profile.index');
    }


}