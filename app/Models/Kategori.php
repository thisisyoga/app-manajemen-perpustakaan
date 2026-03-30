<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];


    
    public function scopeSearchKategori($query, $kategori)
    {
    return $query->where(function ($query) use ($kategori) {
        $query->where('nama_kategori', 'like', "%{$kategori}%");
    });
    }

}
