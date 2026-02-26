@extends('layouts.admin')

@section('content')
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-amber-600">Dashboard</h1>

        <div class="flex items-center gap-4">
            <input type="text" placeholder="Search..."
                class="px-4 py-2 border rounded-lg w-56 focus:outline-none focus:ring-2 focus:ring-amber-400">

            <div class="dropdown relative">
                <button type="button" class="flex items-center gap-2 focus:outline-none group">
                    <div class="relative">
                        <div
                            class="h-9 w-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 overflow-hidden avatar-ring">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
                                class="h-full w-full object-cover">
                        </div>
                        <span
                            class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                    </div>

                    <div class="hidden lg:flex flex-col items-start">
                        <span
                            class="text-sm font-medium text-gray-700 group-hover:text-amber-600 transition-colors duration-200">
                            John Doe
                        </span>
                        <span class="text-xs text-gray-500">Admin</span>
                    </div>

                    <i
                        class="fas fa-chevron-down text-xs text-gray-500 hidden lg:inline transition-transform duration-200 group-hover:text-amber-600"></i>
                </button>

                <div
                    class="dropdown-menu absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl py-1 z-50 opacity-0 invisible transition-all duration-300 transform -translate-y-2 border border-gray-100">
                    <div class="px-4 py-3 border-b border-gray-100">
                        <div class="flex items-center">
                            <div
                                class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 overflow-hidden mr-3">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User"
                                    class="h-full w-full object-cover">
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">John Doe</p>
                                <p class="text-sm text-gray-500">john@example.com</p>
                            </div>
                        </div>
                    </div>

                    <a href="#"
                        class="block px-4 py-2.5 text-gray-700 hover:bg-amber-50 hover:text-amber-600 flex items-center transition-colors duration-200">
                        <i class="fas fa-user-circle text-gray-400 mr-3 w-5 text-center"></i>
                        My Profile
                    </a>

                    <div class="border-t border-gray-100 my-1"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button
                            class="block px-4 py-2.5 text-gray-700 hover:bg-amber-50 hover:text-amber-600 flex items-center transition-colors duration-200">
                            <i class="fas fa-sign-out-alt text-gray-400 mr-3 w-5 text-center"></i>
                            Log out
                        </button>
                </div>
            </div>
        </div>
    </header>

    <div class="bg-white rounded-lg shadow-md">
        <div class="p-4 border-b font-bold text-amber-600">Data Peminjaman Buku</div>
        <table class="w-full text-left">
            <thead class="bg-purple-50">
                <tr>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Buku</th>
                    <th class="p-4">ISBN</th>
                    <th class="p-4">Tanggal Peminjaman</th>
                    <th class="p-4">Tanggal Pengembalian</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pinjam as $p)
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="p-4">{{ $p->user->name }}</td>
                        <td class="p-4">{{ $p->buku->judul_buku }}</td>
                        <td class="p-4">{{ $p->buku->isbn }}</td>
                        <td class="p-4">{{ \Carbon\Carbon::parse($p->tanggal_peminjaman)->format('d M Y') }}</td>
                        <td class="p-4">{{ \Carbon\Carbon::parse($p->tanggal_pengembalian)->format('d M Y') }}</td>
                        <td class="p-4">
                            @if ($p->status == 'menunggu')
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-xs">Menunggu</span>
                            @elseif ($p->status == 'dipinjam')
                                <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs">Dipinjam</span>
                            @elseif ($p->status == 'dikembalikan')
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs">Dikembalikan</span>
                            @elseif ($p->status == 'ditolak')
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs">Ditolak</span>
                            @endif
                        </td>
                        <td class="p-4 flex gap-2">
                            @if ($p->status == 'dipinjam')
                                <a href="{{ route('admin.peminjaman.dikembalikan', $p->id) }}"
                                    class="bg-red-500 text-white px-3 py-1 rounded text-xs font-bold hover:bg-red-600 transition">
                                    Pengembalian
                                </a>
                            @else
                                <span class="text-gray-400 text-xs italic">Sudah diproses</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection