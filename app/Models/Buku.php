<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';

    protected $fillable = [
        'judul_buku',
        'isbn',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        'deskripsi',
        'cover',
    ];

    public function RelasiKategori()
    {
        return $this->belongsToMany(Kategori::class, 'kategoribuku_relasi', 'buku_id', 'kategori_id');
    }

    public function koleksiPribadi()
    {
        return $this->hasMany(KoleksiPribadi::class, 'buku_id');
    }

    public function scopeSearchBuku($query, $buku)
    {
        return $query->where(function ($query) use ($buku) {
            $query->where('judul_buku', 'like', "%{$buku}%")
                    ->orWhere('penulis', 'like', "%{$buku}%")
                    ->orWhere('penerbit', 'like', "%{$buku}%")
                    ->orWhere('tahun_terbit', 'like', "%{$buku}%")
                    ->orwhereHas('RelasiKategori', function ($q) use ($buku) {
                        $q->where('nama_kategori', 'like', "%{$buku}%");});
                    })->orWhere('isbn', 'like', "%{$buku}%");
    }
}
