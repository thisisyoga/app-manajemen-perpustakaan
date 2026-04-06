<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Inventaris Buku</title>
    <style>
        @page {
            size: A4;
            margin: 1.2cm;
        }

        body {
            font-family: sans-serif;
            color: #1e293b;
            line-height: 1.4;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #334155;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .header h1 {
            text-transform: uppercase;
            margin: 0;
            font-size: 18px;
            letter-spacing: 1px;
        }

        /* TABEL OTOMATIS SESUAI ISI */
        table {
            width: 100%;
            border-collapse: collapse;
            /* Auto: Kolom akan melebar sesuai teks terpanjang */
            table-layout: auto;
        }

        th {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 8px 12px;
            text-align: left;
            font-size: 9px;
            text-transform: uppercase;
            white-space: nowrap;
            /* Header tidak boleh turun baris */
        }

        td {
            border: 1px solid #e2e8f0;
            padding: 8px 12px;
            font-size: 10px;
            vertical-align: top;
        }

        /* Paksa kolom tertentu tidak patah baris agar kolom melebar sesuai isi */
        .nowrap {
            white-space: nowrap;
        }

        .text-bold {
            font-weight: bold;
            color: #0f172a;
        }

        .bg-gray {
            background-color: #f8fafc;
        }

        .footer {
            margin-top: 30px;
            width: 100%;
        }

        .sig-box {
            float: right;
            width: 200px;
            text-align: center;
        }

        .meta-info {
            width: 100%;
            margin-bottom: 15px;
            font-size: 10px;
            color: #475569;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Laporan Data Inventaris Buku</h1>
        <p style="font-size: 9px; color: #64748b; margin-top: 5px;">Katalog Perpustakaan Digital</p>
    </div>

    <table class="meta-info">
        <tr>
            <td style="border:none; padding:0;">
                <strong>Dicetak Oleh:</strong> {{ Auth::user()->name ?? 'Admin' }}<br>
                <strong>Dicetak Pada:</strong> {{ date('d/m/Y H:i') }}<br>
                <strong>Total Koleksi:</strong> {{ $bukus->count() }} Judul Buku
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ISBN</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bukus as $key => $b)
                <tr class="{{ $key % 2 == 1 ? 'bg-gray' : '' }}">
                    <td style="text-align:center;">{{ $key + 1 }}</td>
                    <td class="nowrap" style="font-family:monospace;">{{ $b->isbn }}</td>
                    <td class="text-bold">{{ $b->judul_buku }}</td>
                    <td class="nowrap">{{ $b->penulis }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td style="text-align:center;">{{ $b->tahun_terbit }}</td>
                    <td style="text-align:center; font-weight:bold;">{{ $b->stok }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center; padding:20px; color:#94a3b8;">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>

        <div class="text-center w-48">
                        <p class="text-[9px] text-MediumBrown uppercase font-bold mb-16 tracking-widest">Petugas Literasi</p>
                        <div class="border-b border-Chocolate w-full"></div>
                        <p class="text-[10px] text-Chocolate mt-2 font-black uppercase tracking-tighter">Aksara Digital System</p>
                    </div>
    </table>

</body>

</html>
