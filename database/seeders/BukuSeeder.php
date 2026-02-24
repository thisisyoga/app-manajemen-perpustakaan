<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Kategori terlebih dahulu
        $sains = Kategori::create(['nama_kategori' => 'Sains']);
        $novel = Kategori::create(['nama_kategori' => 'Novel']);
        $sejarah = Kategori::create(['nama_kategori' => 'Sejarah']);

        // 2. Buat Dummy Buku
        Buku::create([
            'judul_buku'    => 'Pengetahuan Lingkungan Modern',
            'isbn'          => '978-623-000-01',
            'penulis'       => 'Dr. Ir. Sri Mumpuni N. Rahayu, dkk.',
            'penerbit'      => 'Lentera Ilmu',
            'tahun_terbit'  => 2024,
            'stok'          => 10,
            'kategori_id'   => $sains->id, // Mengambil ID dari kategori Sains
            'deskripsi'     => 'Buku ini mengulas interaksi kompleks antara manusia dan alam.',
            'cover'         => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800',
        ]);

        Buku::create([
            'judul_buku'    => 'Laskar Pelangi',
            'isbn'          => '978-979-306-27',
            'penulis'       => 'Andrea Hirata',
            'penerbit'      => 'Bentang Pustaka',
            'tahun_terbit'  => 2005,
            'stok'          => 5,
            'kategori_id'   => $novel->id, // Mengambil ID dari kategori Novel
            'deskripsi'     => 'Kisah persahabatan 10 anak di Pulau Belitung yang penuh inspirasi.',
            'cover'         => null,
        ]);

        Buku::create([
            'judul_buku'    => 'Sejarah Dunia yang Disembunyikan',
            'isbn'          => '978-602-919-36',
            'penulis'       => 'Jonathan Black',
            'penerbit'      => 'Alvabet',
            'tahun_terbit'  => 2015,
            'stok'          => 0,
            'kategori_id'   => $sejarah->id, // Mengambil ID dari kategori Sejarah
            'deskripsi'     => 'Mengungkap mitos dan sejarah tersembunyi peradaban dunia.',
            'cover'         => null,
        ]);
    }
}