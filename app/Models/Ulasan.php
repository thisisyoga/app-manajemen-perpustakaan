<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasans';
    protected $fillable = [
        'user_id',
        'buku_id',
        'rating',
        'ulasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function scopeSearchUlasan($query, $ulasan)
    {
        return $query->where(function ($query) use ($ulasan) {
            $query->where('ulasan', 'like', "%{$ulasan}%")
                    ->orwhereHas('buku', function ($q) use ($ulasan) {
                        $q->where('judul_buku', 'like', "%{$ulasan}%");})
                    ->orwhereHas('user', function ($q) use ($ulasan) {
                        $q->where('name', 'like', "%{$ulasan}%");});
                    });
    }
}
