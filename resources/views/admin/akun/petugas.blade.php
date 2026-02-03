@extends('layouts.admin')

@section('content')
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-amber-600">Data Petugas</h1>
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-amber-600 flex items-center justify-center text-white font-bold">A</div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-8">

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <div class="flex flex-col md:flex-row justify-between items-center m-6">
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
                    <input type="text" placeholder="Search petugas..."
                        class="w-full px-4 py-2 rounded-md border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <a href="{{ route('create-MDA') }}">
                    <button class="bg-amber-600 text-white px-4 py-2 rounded-md hover:bg-amber-500 transition duration-300">
                        + Petugas
                    </button>
                </a>

            </div>

            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-center">No</th>
                        <th class="py-3 px-6 text-left">Nama Lengkap</th>
                        <th class="py-3 px-6 text-left">Nama</th>
                        <th class="py-3 px-6 text-left">Email</th>
                        <th class="py-3 px-6 text-left">Role</th>
                        <th class="py-3 px-6 text-center">Aksi</th>
                    </tr>
                </thead>

                @foreach ($petugas as $p)
                    <tbody class="text-gray-600 text-sm">
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-6 text-left">{{ $p->NamaLengkap }}</td>
                            <td class="py-3 px-6 text-left">{{ $p->name }}</td>
                            <td class="py-3 px-6 text-left">{{ $p->email }}</td>
                            <td class="py-3 px-6 text-left">{{ $p->role }}</td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex item-center justify-center space-x-4">
                                    <a href="{{ route('edit-MDA', $p->id) }}">
                                        <button class="flex items-center w-auto bg-blue-600 text-white px-2 py-1 rounded-md hover:bg-blue-500 hover:scale-110 transition duration-300">
                                            <span>Edit</span>
                                        </button>
                                    </a>

                                    <form action="{{ route ('delete-MDA', $p->id) }}" method="POST"
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

        <!-- Static Pagination -->
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
