<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $judul }}</title>
    <style>
        @page {
            size: A4;
            margin: 1.5cm;
        }
        body {
            font-family: sans-serif;
            color: #1e293b;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        /* Header / Kop Surat */
        .header {
            text-align: center;
            border-bottom: 2px solid #334155;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h1 {
            text-transform: uppercase;
            margin: 0;
            font-size: 20px;
            letter-spacing: 1px;
            color: #0f172a;
        }
        .header p {
            font-size: 10px;
            color: #64748b;
            margin-top: 5px;
        }

        /* Info Ringkas */
        .report-meta {
            margin-bottom: 15px;
            width: 100%;
            font-size: 11px;
        }

        /* Tabel Utama */
        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: auto;
        }
        
        th {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px 8px;
            text-align: left;
            font-size: 9px;
            text-transform: uppercase;
            color: #475569;
            font-weight: bold;
        }

        td {
            border: 1px solid #e2e8f0;
            padding: 8px;
            font-size: 10px;
            vertical-align: middle;
        }

        .no-col { width: 25px; text-align: center; }
        .date-col { width: 80px; }
        .status-col { width: 70px; text-align: center; }
        
        /* Styling Baris */
        .bg-gray { background-color: #f1f5f9; }
        .text-bold { font-weight: bold; color: #0f172a; }

        /* Badge Status */
        .badge {
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-dipinjam { background-color: #fef3c7; color: #92400e; }
        .status-kembali { background-color: #d1fae5; color: #065f46; }
        .status-telat { background-color: #fee2e2; color: #991b1b; }

        /* Tanda Tangan */
        .footer-section {
            margin-top: 40px;
        }
        .sig-box {
            float: right;
            width: 200px;
            text-align: center;
        }
        .sig-space { height: 60px; }
        .sig-name { border-bottom: 1px solid #1e293b; font-weight: bold; display: inline-block; padding: 0 10px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>{{ strtoupper($judul) }}</h1>
        <p>Laporan Aktivitas Sirkulasi Perpustakaan Digital &bull; Dicetak Otomatis oleh Sistem</p>
    </div>

    <table class="report-meta">
        <tr>
            <td style="border:none; padding:0;">
                <strong>Periode Laporan:</strong> {{ date('d F Y') }},  {{ date('H:i') }} WIB<br>
                <strong>Total Transaksi:</strong> {{ $laporan->count() }} Peminjaman
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-col">No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th class="date-col">Tgl Pinjam</th>
                <th class="date-col">Tgl Kembali</th>
                <th class="status-col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $key => $p)
            <tr class="{{ $key % 2 == 1 ? 'bg-gray' : '' }}">
                <td class="no-col">{{ $key + 1 }}</td>
                <td class="text-bold">{{ $p->user->NamaLengkap }}</td>
                <td>{{ $p->buku->judul_buku }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_peminjaman)->format('d/m/Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d/m/Y') }}</td>
                <td class="status-col">
                    @php
                        $statusClass = '';
                        $statusStr = strtolower($p->status);
                        if($statusStr == 'dipinjam') $statusClass = 'status-dipinjam';
                        elseif($statusStr == 'dikembalikan') $statusClass = 'status-kembali';
                        else $statusClass = 'status-telat';
                    @endphp
                    <span class="badge {{ $statusClass }}">
                        {{ $p->status }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center; padding: 40px; color: #94a3b8; font-style: italic;">
                    Data peminjaman tidak ditemukan untuk kriteria ini.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
{{-- 
    <div class="footer-section">
        <div class="sig-box">
            <p style="font-size: 10px;">Gunung Putri, {{ date('d F Y') }}</p>
            <p style="font-size: 10px; font-weight: bold; margin-bottom: 5px;">Kepala Perpustakaan</p>
            <div class="sig-space"></div>
            <p class="sig-name">{{ Auth::user()->name ?? '..........................' }}</p>
            <p style="font-size: 9px; color: #64748b; margin-top: 5px;">NIP. ____________________</p>
        </div>
    </div> --}}

</body>
</html>