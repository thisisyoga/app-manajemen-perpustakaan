<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Data Kategori
        $sains = Kategori::create(['nama_kategori' => 'Sains']);
        $novel = Kategori::create(['nama_kategori' => 'Novel']);
        $sejarah = Kategori::create(['nama_kategori' => 'Sejarah']);

        // 2. Buat Buku dan Hubungkan Relasinya
        
        // Contoh Buku 1 (Sains)
        $buku1 = Buku::create([
            'judul_buku'    => 'Pengetahuan Lingkungan Modern',
            'isbn'          => '978-623-000-01',
            'penulis'       => 'Dr. Ir. Sri Mumpuni N. Rahayu, dkk.',
            'penerbit'      => 'Lentera Ilmu',
            'tahun_terbit'  => 2024,
            'stok'          => 10,
            'deskripsi'     => 'Buku ini mengulas interaksi kompleks antara manusia dan alam.',
            'cover'         => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?q=80&w=800',
        ]);
        // Ini akan mengisi tabel kategoribuku_relasi
        $buku1->RelasiKategori()->attach($sains->id);

        // Contoh Buku 2 (Novel)
        $buku2 = Buku::create([
            'judul_buku'    => 'Laskar Pelangi',
            'isbn'          => '978-979-306-27',
            'penulis'       => 'Andrea Hirata',
            'penerbit'      => 'Bentang Pustaka',
            'tahun_terbit'  => 2005,
            'stok'          => 5,
            'deskripsi'     => 'Kisah persahabatan 10 anak di Pulau Belitung yang penuh inspirasi.',
        ]);
        $buku2->RelasiKategori()->attach($novel->id);

        // Contoh Buku 3 (Sejarah)
        $buku3 = Buku::create([
            'judul_buku'    => 'Sejarah Dunia yang Disembunyikan',
            'isbn'          => '978-602-919-36',
            'penulis'       => 'Jonathan Black',
            'penerbit'      => 'Alvabet',
            'tahun_terbit'  => 2015,
            'stok'          => 0,
            'deskripsi'     => 'Mengungkap mitos dan sejarah tersembunyi peradaban dunia.',
        ]);
        $buku3->RelasiKategori()->attach($sejarah->id);
    }
}