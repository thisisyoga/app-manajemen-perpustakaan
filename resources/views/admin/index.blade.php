@extends('layouts.admin')

@section('content')
<header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-amber-600">Dashboard</h1>

    <div class="flex items-center gap-4">
        <input
            type="text"
            placeholder="Search..."
            class="px-4 py-2 border rounded-lg w-56 focus:outline-none focus:ring-2 focus:ring-amber-400"
        >

        <div class="dropdown relative">
            <button type="button" class="flex items-center gap-2 focus:outline-none group">
                <div class="relative">
                    <div class="h-9 w-9 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 overflow-hidden avatar-ring">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="h-full w-full object-cover">
                    </div>
                    <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 border-2 border-white"></span>
                </div>

                <div class="hidden lg:flex flex-col items-start">
                    <span class="text-sm font-medium text-gray-700 group-hover:text-amber-600 transition-colors duration-200">
                        John Doe
                    </span>
                    <span class="text-xs text-gray-500">Admin</span>
                </div>

                <i class="fas fa-chevron-down text-xs text-gray-500 hidden lg:inline transition-transform duration-200 group-hover:text-amber-600"></i>
            </button>

            <div class="dropdown-menu absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-xl py-1 z-50 opacity-0 invisible transition-all duration-300 transform -translate-y-2 border border-gray-100">
                <div class="px-4 py-3 border-b border-gray-100">
                    <div class="flex items-center">
                        <div class="h-10 w-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 overflow-hidden mr-3">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User" class="h-full w-full object-cover">
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
                   <button class="block px-4 py-2.5 text-gray-700 hover:bg-amber-50 hover:text-amber-600 flex items-center transition-colors duration-200">
                    <i class="fas fa-sign-out-alt text-gray-400 mr-3 w-5 text-center"></i>
                    Log out
                   </button>
            </div>
        </div>
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
                    <th class="p-4">ISBN</th>
                    <th class="p-4">Tanggal Peminjaman</th>
                    <th class="p-4">Tanggal Pengembalian</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
@endsection
