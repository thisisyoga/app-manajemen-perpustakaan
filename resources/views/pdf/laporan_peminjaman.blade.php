<!DOCTYPE html>
<html>
<head>
    <title>{{ $judul }}</title>
    <style>
        body { font-family: sans-serif; font-size: 11px; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ strtoupper($judul) }}</h2>
        <p>Dicetak pada: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tgl Pinjam</th>
                <th>Tgl Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($laporan as $key => $p)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $p->user->NamaLengkap }}</td> <td>{{ $p->buku->judul_buku }}</td>        <td>{{ $p->tanggal_peminjaman }}</td>
                <td>{{ $p->tanggal_pengembalian }}</td>
                <td>{{ ucfirst($p->status) }}</td>
            </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center; padding: 20px; font-style: italic; color: #666;">
                        Tidak ada data peminjaman saat ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>