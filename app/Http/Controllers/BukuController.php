<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::with('RelasiKategori')->get();
        return view('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.buku.create',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul_buku' => 'required|string|max:255',
        'isbn' => 'required|string|unique:bukus,isbn',
        'penulis' => 'required|string|max:255',
        'penerbit' => 'required|string|max:255',
        'tahun_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
        'stok' => 'required|integer|min:0',
        'kategori' => 'required|exists:kategoris,id',
        'deskripsi' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ],
        [
            'judul_buku.required' => 'Judul buku wajib diisi.',
            'isbn.required' => 'ISBN wajib diisi.',
            'isbn.unique' => 'ISBN sudah digunakan.',
            'penulis.required' => 'Penulis wajib diisi.',
            'penerbit.required' => 'Penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 digit.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.min' => 'Stok tidak boleh negatif.',
            'kategori.required' => 'Kategori wajib diisi.',
        ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('covers', 'public');
    } else {
        $imagePath = null;
    }

    Buku::create([
        'judul_buku' => $validatedData['judul_buku'],
        'isbn' => $validatedData['isbn'],
        'penulis' => $validatedData['penulis'],
        'penerbit' => $validatedData['penerbit'],
        'tahun_terbit' => $validatedData['tahun_terbit'],
        'stok' => $validatedData['stok'],
        'kategori' => $validatedData['kategori'],
        'deskripsi' => $validatedData['deskripsi'] ?? null,
        'cover' => $imagePath,
    ]);

    return redirect()->route('MDB')->with('success', 'Buku berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $book = Buku::findOrFail($buku->id);
        $kategori = Kategori::all();
        return view('admin.buku.edit', compact('book','kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validatedData = $request->validate([
            'judul_buku' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:bukus,isbn,' . $buku->id,
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
        [
            'judul_buku.required' => 'Judul buku wajib diisi.',
            'isbn.required' => 'ISBN wajib diisi.',
            'isbn.unique' => 'ISBN sudah digunakan oleh buku lain.',
            'penulis.required' => 'Penulis wajib diisi.',
            'penerbit.required' => 'Penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.digits' => 'Tahun terbit harus terdiri dari 4 digit.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.min' => 'Stok tidak boleh negatif.',
            'kategori.required' => 'Kategori wajib diisi.',
        ]);

        $buku = Buku::findOrFail($buku->id);

        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('covers', 'public');
        $buku->cover = $imagePath;
}

        $buku->judul_buku = $validatedData['judul_buku'];
        $buku->isbn = $validatedData['isbn'];
        $buku->penulis = $validatedData['penulis'];
        $buku->penerbit = $validatedData['penerbit'];
        $buku->tahun_terbit = $validatedData['tahun_terbit'];
        $buku->stok = $validatedData['stok'];
        $buku->kategori = $validatedData['kategori'];
        $buku->deskripsi = $validatedData['deskripsi'] ?? null;

        $buku->save();

        return redirect()->route('MDB')->with('success', 'Buku berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku = Buku::findOrFail($buku->id);
        $buku->delete();

        return redirect()->route('MDB')->with('success', 'Buku berhasil dihapus.');
    }
}
