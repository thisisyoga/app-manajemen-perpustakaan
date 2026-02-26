<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    protected $fillable = [
        'user_id', 
        'buku_id', 
        'tanggal_peminjaman', 
        'tanggal_pengembalian', 
        'status'
    ];

    // Relasi ke User
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Buku
    public function buku() {
        return $this->belongsTo(Buku::class);
    }
}