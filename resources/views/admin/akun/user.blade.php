@extends('layouts.admin')

@section('content')
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <h1 class="text-xl font-bold text-amber-600">Data User</h1>
        <div class="flex items-center gap-4">
            <div class="w-10 h-10 rounded-full bg-amber-600 flex items-center justify-center text-white font-bold">SR</div>
        </div>
    </header>
    <div class="container mx-auto px-4 py-8">

        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <div class="flex flex-col md:flex-row justify-between items-center m-6">
                <div class="w-full md:w-1/3 mb-4 md:mb-0">
                    <input type="text" placeholder="Search User..."
                        class="w-full px-4 py-2 rounded-md border border-gray-300 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
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

                @foreach ($user as $u)
                
                <tbody class="text-gray-600 text-sm">
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-center">{{$loop->iteration}}</td>
                        <td class="py-3 px-6 text-left">{{$u->NamaLengkap}}</td>
                        <td class="py-3 px-6 text-left">{{$u->name}}</td>
                        <td class="py-3 px-6 text-left">{{$u->email}}</td>
                        <td class="py-3 px-6 text-left">{{$u->role}}</td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <button class="flex items-center w-auto hover:text-red-500 hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-4 h-4 mr-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    <span>Delete</span>
                                </button>
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
