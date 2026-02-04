@extends('layouts.admin')

@section('content')
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-amber-600">Master Data Buku</h1>
    <div class="flex items-center gap-4">
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
    <div class="container mx-auto px-4 py-8">

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <div class="flex flex-col md:flex-row justify-between items-center m-6">
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
                    <input type="text" placeholder="Search Buku..."
                        class="w-full px-4 py-2 rounded-md border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <a href="{{ route('create-MDB') }}">
                    <button class="bg-amber-600 text-white px-4 py-2 rounded-md hover:bg-amber-500 transition duration-300">
                        + Buku
                    </button>
                </a>

            </div>

            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">No</th>
                        <th class="py-3 px-6 text-left">Cover</th>
                        <th class="py-3 px-6 text-left">Judul</th>
                        <th class="py-3 px-6 text-left">Penulis</th>
                        <th class="py-3 px-6 text-left">Tahun Terbit</th>
                        <th class="py-3 px-6 text-left">Stok</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                @foreach ($buku as $b )
            
                    <tbody class="text-gray-600 text-sm">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">{{ $loop->iteration}}</td>
                            <td class="py-3 w-2 px-6 text-center">
                                <img src="{{ asset('storage/' . $b->cover) }}" alt="">
                            </td>
                            <td class="py-3 px-6 text-left">{{ $b->judul_buku }}</td>
                            <td class="py-3 px-6 text-left">{{ $b->penulis }}</td>
                            <td class="py-3 px-6 text-left">{{$b->tahun_terbit}}</td>
                            <td class="py-3 px-6 text-left">{{ $b->stok }}</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center space-x-4">
                                    <a href="{{ route('edit-MDB', $b->id) }}">
                                        <button class="flex items-center w-auto bg-blue-600 text-white px-2 py-1 rounded-md hover:bg-blue-500 hover:scale-110 transition duration-300">
                                            <span>Edit</span>
                                        </button>
                                    </a>

                                    <form action="{{ route('delete-MDB', $b->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="flex items-center w-auto bg-red-600 text-white px-2 py-1 rounded-md hover:bg-red-500 hover:scale-110 transition duration-300">
                                            <span>Hapus</span>
                                        </button>
                                    </form>

                                    <a href="">
                                        <button class="flex items-center w-auto bg-green-600 text-white px-2 py-1 rounded-md hover:bg-green-500 hover:scale-110 transition duration-300">
                                            <span>Detail</span>
                                        </button>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>
        </div>

        <div class="flex justify-between items-center mt-6">
            <div>
                <span class="text-sm text-gray-700">
                    Showing 1 to 5 of 5 entries
                </span>
            </div>
            <div class="flex space-x-2">
                <a href="https://abhirajk.vercel.app/" target="blank">

                    <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 opacity-50">
                        Previous
                    </button>
                </a>
                <a href="https://abhirajk.vercel.app/" target="blank">

                    <button class="px-3 py-1 rounded-md bg-gray-200 text-gray-700 opacity-50">
                        Next
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
