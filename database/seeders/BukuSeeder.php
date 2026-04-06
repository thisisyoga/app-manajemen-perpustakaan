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
        // 1. DATA KATEGORI (BARU)
        // =========================
        $fiksiSejarah = Kategori::create(['nama_kategori' => 'Fiksi Sejarah']);
        $realismeMagis= Kategori::create(['nama_kategori' => 'Realisme Magis']);
        $selfHelp     = Kategori::create(['nama_kategori' => 'Self-Help']);
        $fantasi      = Kategori::create(['nama_kategori' => 'Fantasi']);
        $sejarah      = Kategori::create(['nama_kategori' => 'Sejarah']);
        $filsafat     = Kategori::create(['nama_kategori' => 'Filsafat']);
        $inspiratif   = Kategori::create(['nama_kategori' => 'Inspiratif']);
        $fiksi        = Kategori::create(['nama_kategori' => 'Fiksi']);
        $romance      = Kategori::create(['nama_kategori' => 'Romance']);
        $puisi        = Kategori::create(['nama_kategori' => 'Puisi']);

        // =========================
        // 2. DATA BUKU
        // =========================
        $dataBuku = [
            [
                'judul_buku' => 'Laut Bercerita',
                'penulis' => 'Leila S. Chudori',
                'penerbit' => 'KPG',
                'tahun_terbit' => 2017,
                'stok' => 5,
                'kategori' => $fiksiSejarah->id
            ],
            [
                'judul_buku' => 'Cantik Itu Luka',
                'penulis' => 'Eka Kurniawan',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2002,
                'stok' => 5,
                'kategori' => $realismeMagis->id
            ],
            [
                'judul_buku' => 'Filosofi Teras',
                'penulis' => 'Henry Manampiring',
                'penerbit' => 'Kompas',
                'tahun_terbit' => 2018,
                'stok' => 5,
                'kategori' => $selfHelp->id
            ],
            [
                'judul_buku' => 'Bumi',
                'penulis' => 'Tere Liye',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2014,
                'stok' => 5,
                'kategori' => $fantasi->id
            ],
            [
                'judul_buku' => 'Atomic Habits',
                'penulis' => 'James Clear',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2019,
                'stok' => 5,
                'kategori' => $selfHelp->id
            ],
            [
                'judul_buku' => 'Sapiens',
                'penulis' => 'Yuval Noah Harari',
                'penerbit' => 'KPG',
                'tahun_terbit' => 2011,
                'stok' => 5,
                'kategori' => $sejarah->id
            ],
            [
                'judul_buku' => 'Gadis Kretek',
                'penulis' => 'Ratih Kumala',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2012,
                'stok' => 5,
                'kategori' => $fiksiSejarah->id
            ],
            [
                'judul_buku' => 'The Midnight Library',
                'penulis' => 'Matt Haig',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2020,
                'stok' => 5,
                'kategori' => $fantasi->id
            ],
            [
                'judul_buku' => 'Pulang',
                'penulis' => 'Leila S. Chudori',
                'penerbit' => 'KPG',
                'tahun_terbit' => 2012,
                'stok' => 5,
                'kategori' => $fiksiSejarah->id
            ],
            [
                'judul_buku' => 'Dunia Sophie',
                'penulis' => 'Jostein Gaarder',
                'penerbit' => 'Mizan',
                'tahun_terbit' => 1991,
                'stok' => 5,
                'kategori' => $filsafat->id
            ],
            [
                'judul_buku' => 'Laskar Pelangi',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang',
                'tahun_terbit' => 2005,
                'stok' => 5,
                'kategori' => $inspiratif->id
            ],
            [
                'judul_buku' => 'Ikigai',
                'penulis' => 'Héctor García',
                'penerbit' => 'Gramedia',
                'tahun_terbit' => 2016,
                'stok' => 5,
                'kategori' => $selfHelp->id
            ],
            [
                'judul_buku' => 'Orang-Orang Biasa',
                'penulis' => 'Andrea Hirata',
                'penerbit' => 'Bentang',
                'tahun_terbit' => 2019,
                'stok' => 5,
                'kategori' => $fiksi->id
            ],
            [
                'judul_buku' => 'Dikta & Hukum',
                'penulis' => "Dhia'an Farah",
                'penerbit' => 'Asoka',
                'tahun_terbit' => 2021,
                'stok' => 5,
                'kategori' => $romance->id
            ],
            [
                'judul_buku' => 'Home Body',
                'penulis' => 'Rupi Kaur',
                'penerbit' => 'KPG',
                'tahun_terbit' => 2020,
                'stok' => 5,
                'kategori' => $puisi->id
            ],
        ];

        // =========================
        // 3. INSERT + ISBN UNIK
        // =========================
        foreach ($dataBuku as $index => $data) {
            $kategoriId = $data['kategori'];
            unset($data['kategori']);

            // generate ISBN unik otomatis
            $data['isbn'] = '97860242469' . str_pad($index + 1, 2, '0', STR_PAD_LEFT);

            $buku = Buku::create($data);
            $buku->RelasiKategori()->attach($kategoriId);
        }
    }
}