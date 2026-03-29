<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar buku beserta kategorinya.
     */
    public function index()
    {
        // Menggunakan Eager Loading dengan nama relasi 'RelasiKategori'
        $buku = Buku::with('RelasiKategori')->get();
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Form tambah buku.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.buku.create', compact('kategori'));
    }

    /**
     * Menyimpan data buku baru.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul_buku'   => 'required|string|max:255',
            'isbn'         => 'required|string|unique:bukus,isbn',
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'stok'         => 'required|integer|min:0',
            'kategori'     => 'required|exists:kategoris,id',
            'deskripsi'    => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'judul_buku.required'   => 'Judul buku wajib diisi.',
            'isbn.required'         => 'ISBN wajib diisi.',
            'isbn.unique'           => 'ISBN sudah terdaftar.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'penerbit.required'     => 'Nama penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.digits'   => 'Tahun terbit harus 4 digit.',
            'tahun_terbit.min'      => 'Tahun terbit tidak valid.',
            'tahun_terbit.max'      => 'Tahun terbit tidak boleh melebihi tahun sekarang.',
            'stok.required'         => 'Stok wajib diisi.',
            'stok.integer'          => 'Stok harus berupa angka.',
            'stok.min'              => 'Stok tidak boleh kurang dari 0.',
            'kategori.required'     => 'Kategori wajib dipilih.',
            'kategori.exists'       => 'Kategori tidak valid.',
            'image.image'           => 'File cover harus berupa gambar.',
            'image.mimes'           => 'Format cover harus JPG, JPEG, atau PNG.',
            'image.max'             => 'Ukuran cover maksimal 2MB.',
        ]);

        // Handle upload cover
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('covers', 'public');
        }

        // 1. Simpan data ke tabel 'bukus'
        $buku = Buku::create([
            'judul_buku'   => $validatedData['judul_buku'],
            'isbn'         => $validatedData['isbn'],
            'penulis'      => $validatedData['penulis'],
            'penerbit'     => $validatedData['penerbit'],
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'stok'         => $validatedData['stok'],
            'deskripsi'    => $validatedData['deskripsi'] ?? null,
            'cover'        => $imagePath,
        ]);

        // 2. Hubungkan ke tabel pivot 'kategoribuku_relasi'
        // Menggunakan nama method relasi yang kamu buat: RelasiKategori()
        $buku->RelasiKategori()->attach($request->kategori);

        return redirect()->route('MDB')->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Form edit buku.
     */
    public function edit(Buku $buku)
{
    $kategori = Kategori::all();
    
    // Ambil ID kategori yang sudah terhubung
    $selectedKategori = $buku->RelasiKategori->pluck('id')->toArray();
    
    // Kirim variabel $buku dengan nama 'book' ke view
    return view('admin.buku.edit', [
        'book' => $buku, // Ini yang membuat $book bisa dipakai di Blade
        'kategori' => $kategori,
        'selectedKategori' => $selectedKategori
    ]);
}

    /**
     * Memperbarui data buku.
     */
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul_buku'   => 'required|string|max:255',
            'isbn'         => 'required|string|unique:bukus,isbn,' . $buku->id,
            'penulis'      => 'required|string|max:255',
            'penerbit'     => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'stok'         => 'required|integer|min:0',
            'kategori'     => 'required|exists:kategoris,id',
            'deskripsi'    => 'nullable|string',
            'image'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus cover lama jika ada
            if ($buku->cover) {
                Storage::disk('public')->delete($buku->cover);
            }
            $buku->cover = $request->file('image')->store('covers', 'public');
        }

        // Update data utama buku
        $buku->update([
            'judul_buku'   => $validatedData['judul_buku'],
            'isbn'         => $validatedData['isbn'],
            'penulis'      => $validatedData['penulis'],
            'penerbit'     => $validatedData['penerbit'],
            'tahun_terbit' => $validatedData['tahun_terbit'],
            'stok'         => $validatedData['stok'],
            'deskripsi'    => $validatedData['deskripsi'] ?? null,
        ]);

        // Update relasi di tabel pivot (sync akan menghapus yang lama dan mengganti dengan yang baru)
        $buku->RelasiKategori()->sync($request->kategori);

        return redirect()->route('MDB')->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Menghapus buku.
     */
    public function destroy(Buku $buku)
    {
        // Hapus file gambar dari storage
        if ($buku->cover) {
            Storage::disk('public')->delete($buku->cover);
        }

        // Hapus data buku (Relasi di tabel pivot akan otomatis terhapus jika pakai onDelete('cascade'))
        $buku->delete();

        return redirect()->route('MDB')->with('success', 'Buku berhasil dihapus.');
    }
}