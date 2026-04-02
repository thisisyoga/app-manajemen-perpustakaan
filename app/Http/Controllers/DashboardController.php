<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Ulasan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function admin()
    {
        $user = User::all();
        $buku = Buku::all();
        $pinjam = Peminjaman::where('status', 'menunggu')->get();
        $bukudipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $ulasan = Ulasan::all();

        return view('admin.index', compact('user', 'buku', 'pinjam', 'bukudipinjam', 'ulasan'));
    }

    public function setuju($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $peminjaman = Peminjaman::lockForUpdate()->findOrFail($id);
                $buku = Buku::lockForUpdate()->findOrFail($peminjaman->buku_id);

                if ($peminjaman->status !== 'menunggu') {
                    throw new \Exception('Peminjaman ini sudah diproses.');
                }

                if ($buku->stok <= 0) {
                    throw new \Exception('Stok buku habis. Peminjaman tidak bisa disetujui.');
                }

                $peminjaman->update([
                    'status' => 'dipinjam'
                ]);

                $buku->decrement('stok');
            });

            return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function tolak($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'menunggu') {
            return redirect()->back()->with('error', 'Peminjaman ini sudah diproses.');
        }

        $peminjaman->update([
            'status' => 'ditolak'
        ]);

        return redirect()->back()->with('success', 'Peminjaman ditolak.');
    }

    public function diajukan($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'dipinjam') {
            return redirect()->back()->with('error', 'Buku ini belum bisa diajukan untuk pengembalian.');
        }

        $peminjaman->update([
            'status' => 'diajukan'
        ]);

        return redirect()->back()->with('success', 'Pengembalian buku berhasil diajukan.');
    }

    public function dikembalikan($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $peminjaman = Peminjaman::lockForUpdate()->findOrFail($id);
                $buku = Buku::lockForUpdate()->findOrFail($peminjaman->buku_id);

                if ($peminjaman->status !== 'diajukan') {
                    throw new \Exception('Buku ini belum diajukan untuk dikembalikan.');
                }

                $peminjaman->update([
                    'status' => 'dikembalikan'
                ]);

                $buku->increment('stok');
            });

            return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function pengembalian()
    {
        $user = User::all();
        $buku = Buku::all();
        $pinjam = Peminjaman::where('status', 'diajukan')->get();

        return view('admin.pengembalian', compact('user', 'buku', 'pinjam'));
    }

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
    public function exportpeminjaman()
    {
        $data = Peminjaman::with(['user', 'buku'])
            ->where('status', 'dipinjam')
            ->get();

        $pdf = Pdf::loadView('pdf.laporan_peminjaman', [
            'laporan' => $data,
            'judul'   => 'Laporan Peminjaman (Sedang Dipinjam)'
        ]);

        return $pdf->download('laporan-peminjaman.pdf');
    }
    public function exportbuku()
    {
        $data = Buku::all();

        $pdf = Pdf::loadView('pdf.laporan_buku', [
            'bukus' => $data,
            'judul'   => 'Laporan Inventaris Buku'
        ]);

        return $pdf->download('laporan-buku.pdf');
    }
}