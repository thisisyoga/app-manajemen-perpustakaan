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
        'kategori',
        'deskripsi',
        'cover',
    ];

    public function RelasiKategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori', 'id');
    }
}
