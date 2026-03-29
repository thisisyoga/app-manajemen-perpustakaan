<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        $user = User::all();
        $buku = Buku::all();
        $pinjam = Peminjaman::where('status', 'menunggu')->get();
        $bukudipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $ulasan = Ulasan::all();
        return view('admin.index', compact('user','buku','pinjam','bukudipinjam','ulasan'));
    }

    public function setuju($id)
    {
        Peminjaman::where('id', $id)->update(['status' => 'dipinjam']);
        return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
    }

    public function tolak($id)
    {
        Peminjaman::where('id', $id)->update(['status' => 'ditolak']);
        return redirect()->back()->with('success', 'Peminjaman ditolak.');
    }


        public function dikembalikan($id)
    {
        Peminjaman::where('id', $id)->update(['status' => 'dikembalikan']);
        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }
        public function diajukan($id)
    {
        Peminjaman::where('id', $id)->update(['status' => 'dipinjam']);
        return redirect()->back()->with('success', 'buku dikembalika ke user.');
    }

    public function pengembalian()
    {
        $user = User::all();
        $buku = Buku::all();
        $pinjam = Peminjaman::where('status', 'diajukan')->get();
        return view('admin.pengembalian', compact('user','buku','pinjam'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function exportByRole($role)
{
    $validRoles = ['admin', 'user', 'petugas'];
    if (!in_array($role, $validRoles)) {
        abort(404, 'Role tidak ditemukan');
    }

    $data = User::where('role', $role)->get();
    $pdf = Pdf::loadView('pdf.laporan', [
        'users' => $data,
        'role'  => ucfirst($role) 
    ]);

    return $pdf->download("laporan-data-{$role}.pdf");
}

public function exportPeminjamanSelesai()
{
    $data = Peminjaman::with(['user', 'buku'])
                ->where('status', 'dikembalikan')
                ->get();

    $pdf = Pdf::loadView('pdf.laporan_peminjaman', [
        'laporan' => $data,
        'judul'   => 'Laporan Peminjaman Selesai (Dikembalikan)'
    ]);

    return $pdf->download('laporan-peminjaman-selesai.pdf');
}
}
