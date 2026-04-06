<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data {{ $role }}</title>
    <style>
        /* Setup Dasar DomPDF */
        @page {
            size: A4;
            margin: 1.5cm;
        }
        body {
            font-family: sans-serif;
            color: #1e293b; /* slate-800 */
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }

        /* Header */
        .header {
            text-align: center;
            border-bottom: 2px solid #334155;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h1 {
            text-transform: uppercase;
            margin: 0;
            font-size: 22px;
            letter-spacing: 2px;
        }
        .header p {
            font-size: 10px;
            color: #64748b;
            margin-top: 5px;
        }

        /* Info Laporan */
        .info-container {
            margin-bottom: 20px;
            width: 100%;
        }
        .info-text {
            font-size: 11px;
            color: #475569;
        }

        /* Tabel - Auto Fit Isi */
        table {
            width: 100%;
            border-collapse: collapse;
            /* Table layout auto agar menyesuaikan panjang teks */
            table-layout: auto; 
        }
        
        th {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
            font-size: 10px;
            text-transform: uppercase;
            color: #334155;
        }

        td {
            border: 1px solid #e2e8f0;
            padding: 8px 10px;
            font-size: 11px;
            vertical-align: middle;
        }

        .no-column { text-align: center; width: 30px; }
        .text-bold { font-weight: bold; color: #0f172a; }
        .bg-strip { background-color: #f1f5f9; }

        /* Tanda Tangan */
        .signature-wrapper {
            margin-top: 40px;
            margin-left: 500px;
            width: 100%;
            display: flex;
            justify-content: flex-end;
            text-align: right;
        }
        .signature-box {
            width: 220px;
            text-align: center;
        }
        .signature-space {
            height: 60px;
        }
        .name-line {
            border-bottom: 1px solid #000;
            display: block;
            padding: 0 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan Data {{ $role }}</h1>
        <p>Sistem Informasi Perpustakaan Digital • Laporan Resmi Instansi</p>
    </div>

    <table class="info-container">
        <tr>
            <td style="border:none; padding:0;" class="info-text">
                <strong>Tanggal Cetak:</strong> {{ date('d F Y, H:i') }}<br>
                <strong>Total Data:</strong> {{ $users->count() }} Orang
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-column">No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $key => $user)
            <tr class="{{ $key % 2 == 1 ? 'bg-strip' : '' }}">
                <td class="no-column">{{ $key + 1 }}</td>
                <td class="text-bold">{{ $user->NamaLengkap }}</td>
                <td>{{ $user->name }}</td>
                <td style="color: #475569; font-style: italic;">{{ $user->email }}</td>
                <td>{{ $user->alamat ?? '-' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center; padding:30px; color:#94a3b8;">
                    Tidak ada data ditemukan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="signature-wrapper">
        <div class="signature-box">
            <div class="mengetahui" style="margin-top: 8px; font-size: 11px; color: #475569;">
                mengetahui,<br>
                {{ $authUser->role }}
            </div>
            <div class="signature-space"></div>
            <div class="name-line">
                {{ optional($authUser)->NamaLengkap ?? optional($authUser)->name ?? '__________________' }}
            </div>
        </div>
    </div>

</body>
</html>