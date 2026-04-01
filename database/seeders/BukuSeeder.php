<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // 1. DATA KATEGORI
        // =========================
        $sains     = Kategori::create(['nama_kategori' => 'Sains']);
        $teknologi = Kategori::create(['nama_kategori' => 'Teknologi']);
        $bisnis    = Kategori::create(['nama_kategori' => 'Bisnis']);
        $pendidikan= Kategori::create(['nama_kategori' => 'Pendidikan']);
        $sastra    = Kategori::create(['nama_kategori' => 'Sastra']);
        $sejarah   = Kategori::create(['nama_kategori' => 'Sejarah']);
        $agama     = Kategori::create(['nama_kategori' => 'Agama']);
        $kesehatan = Kategori::create(['nama_kategori' => 'Kesehatan']);
        $pertanian = Kategori::create(['nama_kategori' => 'Pertanian']);
        $kuliner   = Kategori::create(['nama_kategori' => 'Kuliner']);
        $seni      = Kategori::create(['nama_kategori' => 'Seni']);
        $arsitektur= Kategori::create(['nama_kategori' => 'Arsitektur']);
        $hukum     = Kategori::create(['nama_kategori' => 'Hukum']);
        $ekonomi   = Kategori::create(['nama_kategori' => 'Ekonomi']);
        $motivasi  = Kategori::create(['nama_kategori' => 'Motivasi']);

        // =========================
        // 2. DATA BUKU (20 DATA)
        // =========================

        $dataBuku = [
            [
                'judul_buku' => 'Buah-buahan Langka di Dunia',
                'isbn' => '978-000-001',
                'penulis' => 'Ahmad Fauzi',
                'penerbit' => 'Agro Media',
                'tahun_terbit' => 2020,
                'stok' => 5,
                'kategori' => $pertanian->id
            ],
            [
                'judul_buku' => 'Makanan Khas Cirebon',
                'isbn' => '978-000-002',
                'penulis' => 'Siti Aminah',
                'penerbit' => 'Kuliner Nusantara',
                'tahun_terbit' => 2019,
                'stok' => 6,
                'kategori' => $kuliner->id
            ],
            [
                'judul_buku' => 'Musik Digital',
                'isbn' => '978-000-003',
                'penulis' => 'Rizky Pratama',
                'penerbit' => 'Media Kreatif',
                'tahun_terbit' => 2021,
                'stok' => 4,
                'kategori' => $seni->id
            ],
            [
                'judul_buku' => 'Pengantar Mikrokontroler',
                'isbn' => '978-000-004',
                'penulis' => 'Budi Santoso',
                'penerbit' => 'Informatika',
                'tahun_terbit' => 2022,
                'stok' => 8,
                'kategori' => $teknologi->id
            ],
            [
                'judul_buku' => 'Statistika untuk Penelitian',
                'isbn' => '978-000-005',
                'penulis' => 'Sugiyono',
                'penerbit' => 'Alfabeta',
                'tahun_terbit' => 2018,
                'stok' => 7,
                'kategori' => $pendidikan->id
            ],
            [
                'judul_buku' => 'Manajemen Stratejik',
                'isbn' => '978-000-006',
                'penulis' => 'Kotler',
                'penerbit' => 'Erlangga',
                'tahun_terbit' => 2017,
                'stok' => 5,
                'kategori' => $bisnis->id
            ],
            [
                'judul_buku' => 'Hukum Internasional',
                'isbn' => '978-000-007',
                'penulis' => 'Prof. Hikmahanto',
                'penerbit' => 'Rajawali',
                'tahun_terbit' => 2016,
                'stok' => 3,
                'kategori' => $hukum->id
            ],
            [
                'judul_buku' => 'Ilmu dan Teknologi Biomaterial',
                'isbn' => '978-000-008',
                'penulis' => 'Dr. Andi',
                'penerbit' => 'Sains Press',
                'tahun_terbit' => 2021,
                'stok' => 6,
                'kategori' => $sains->id
            ],
            [
                'judul_buku' => 'Kumpulan Puisi Senja',
                'isbn' => '978-000-009',
                'penulis' => 'Taufik Ismail',
                'penerbit' => 'Sastra Nusantara',
                'tahun_terbit' => 2015,
                'stok' => 4,
                'kategori' => $sastra->id
            ],
            [
                'judul_buku' => 'Sejarah Peradaban Dunia',
                'isbn' => '978-000-010',
                'penulis' => 'Yuval Noah Harari',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2014,
                'stok' => 6,
                'kategori' => $sejarah->id
            ],
        ];

        // =========================
        // 3. INSERT + RELASI
        // =========================
        foreach ($dataBuku as $data) {
            $kategoriId = $data['kategori'];
            unset($data['kategori']);

            $buku = Buku::create($data);
            $buku->RelasiKategori()->attach($kategoriId);
        }
    }
}