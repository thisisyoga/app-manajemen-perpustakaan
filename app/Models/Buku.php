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
}
