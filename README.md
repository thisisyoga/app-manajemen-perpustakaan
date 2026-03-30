<div align="center">
  <img src="public/image/logo.png" alt="Logo Aksara" width="350" height="350">
</div>

# 📚 Aksara - Sistem Manajemen Perpustakaan Digital

**Aksara** adalah aplikasi manajemen perpustakaan berbasis web yang dirancang untuk menyederhanakan proses sirkulasi buku. Mulai dari pendataan koleksi hingga manajemen peminjaman, Aksara hadir sebagai solusi digital yang efisien dan modern bagi pengelola maupun pembaca umum.

---

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![Status](https://img.shields.io/badge/Status-Dalam%20Pengembangan-yellow?style=for-the-badge)

## 🚀 Fitur Utama

-   **Peminjaman Buku:** Alur kerja digital untuk memproses peminjaman dan pengembalian buku secara real-time.
-   **Manajemen Koleksi:** Modul lengkap untuk menambah, memperbarui, dan menghapus data buku (CRUD).
-   **Manajemen Pengguna:** Kendali akses terpusat untuk anggota, petugas, dan administrator.
-   **Antarmuka Modern:** Desain responsif dan bersih menggunakan Tailwind CSS untuk pengalaman pengguna yang optimal.

## 🛠️ Stack Teknologi

Aplikasi ini dibangun menggunakan ekosistem PHP modern:

-   **Framework:** [Laravel 11](https://laravel.com)
-   **Styling:** [Tailwind CSS](https://tailwindcss.com)
-   **Database:** MySQL / MariaDB

## 💻 Cara Instalasi (Lokal)

Pastikan Anda memiliki **PHP >= 8.2**, **Composer**, dan **Node.js** terinstal di perangkat Anda.

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/thisisyoga/app-manajemen-perpustakaan.git](https://github.com/thisisyoga/app-manajemen-perpustakaan.git)
    cd app-manajemen-perpustakaan
    ```

2.  **Instal Dependensi**
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Konfigurasi Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan kredensial database Anda.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Generate Key**
    ```bash
    php artisan key:generate
    ```

5.  **Migrasi Database**
    ```bash
    php artisan migrate
    ```

6.  **Jalankan Server**
    ```bash
    php artisan serve
    ```

7. **Install npm**
    ```bash
    npm install
    ```

8. **Jalankan npm**
    ```bash
    npm run dev
    ```

## 📈 Status Pengembangan

Aplikasi ini sedang dalam tahap pengembangan aktif. Berikut adalah progres pengerjaan fitur:

- [x] **Autentikasi:** Login Multi-role (Admin, Petugas, User).
- [x] **Manajemen Buku:** CRUD data buku dan kategori.
- [x] **Sirkulasi:** Proses peminjaman dan Pengembalian.
- [ ] **Denda:** Perhitungan otomatis keterlambatan pengembalian.
- [ ] **Dashboard:** Ringkasan statistik dalam bentuk grafik/chart.
- [x] **Ekspor Data:** Cetak laporan peminjaman ke PDF/Excel.

---

**Dikembangkan oleh [Yoga](https://github.com/thisisyoga)**

---
