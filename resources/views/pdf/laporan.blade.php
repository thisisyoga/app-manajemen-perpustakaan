<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data {{ $role }}</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .footer {
            margin-top: 20px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>DAFTAR DATA {{ strtoupper($role) }}</h2>
        <p>Dicetak pada: {{ date('d-m-Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $key => $user)
                <tr>
                    <td style="text-align: center;">{{ $key + 1 }}</td>
                    <td>{{ $user->NamaLengkap }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->alamat ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; padding: 20px; font-style: italic; color: #666;">
                        Tidak ada data {{ $role }} yang ditemukan untuk periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- <div class="footer">
        <p>Tanda Tangan,</p>
        <br><br>
        <p>(_________________)</p>
    </div> --}}
</body>

</html>
