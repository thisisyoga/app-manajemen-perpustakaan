@extends('layouts.admin')

@section('content')
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-amber-600">Dashboard</h1>
        <div class="flex items-center gap-4">
            <input type="text" placeholder="Search..." class="px-4 py-2 border rounded-lg">
            <div class="w-10 h-10 rounded-full bg-amber-500 flex items-center justify-center text-white font-bold">SR</div>
        </div>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-sm text-gray-500">Total Users</p>
            <h2 class="text-3xl font-bold text-purple-700 mt-2">-</h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-sm text-gray-500">Total Buku</p>
            <h2 class="text-3xl font-bold text-green-600 mt-2">-</h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-sm text-gray-500">Buku Dipinjam</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">-</h2>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md">
            <p class="text-sm text-gray-500">gak tau di tambah apaan</p>
            <h2 class="text-3xl font-bold text-red-500 mt-2">-</h2>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 border-b font-bold text-amber-600">Data Peminjaman Buku</div>
        <table class="w-full text-left">
            <thead class="bg-purple-50">
                <tr>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Buku</th>
                    <th class="p-4">Kode Peminjaman</th>
                    <th class="p-4">Tanggal Peminjaman</th>
                    <th class="p-4">Tanggal Pengembalian</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-t">
                    <td class="p-4">John Doe</td>
                    <td class="p-4">Nama Buku</td>
                    <td class="p-4">BK-0001</td>
                    <td class="p-4">29 Januari 2026</td>
                    <td class="p-4">29 Januari 2026</td>
                    <td class="p-4 text-green-600 font-bold">Setuju</td>
                  </tr>
                  <tr class="border-t">
                    <td class="p-4">Jane Smith</td>
                    <td class="p-4">Nama Buku</td>
                    <td class="p-4">BK-0002</td>
                    <td class="p-4">29 Januari 2026</td>
                    <td class="p-4">29 Januari 2026</td>
                    <td class="p-4 text-yellow-500 font-bold">Pending</td>
                  </tr>
                  <tr class="border-t">
                    <td class="p-4">Jane Smith</td>
                    <td class="p-4">Nama Buku</td>
                    <td class="p-4">BK-0003</td>
                    <td class="p-4">29 Januari 2026</td>
                    <td class="p-4">29 Januari 2026</td>
                    <td class="p-4 text-red-500 font-bold">Ditolak</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
