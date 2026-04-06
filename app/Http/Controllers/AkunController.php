<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::where('role', 'petugas')->get();
        $userInput = request()->query('user');
        $query = User::where('role', 'petugas');
        
        $query->when($userInput, function ($q) use ($userInput) {
        return $q->searchUser($userInput);
        });

        $petugas = $query->latest()->paginate(10)->withQueryString();
        return view('admin.akun.petugas', compact('petugas'));
    }

    public function user()
    {
        $user = User::where('role', 'user')->get();
        $userInput = request()->query('user');
        $query = User::where('role', 'user');

        $query->when($userInput, function ($q) use ($userInput) {
        return $q->searchUser($userInput);
        });
        
        $user = $query->latest()->paginate(10)->withQueryString();
        return view('admin.akun.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.akun.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'NamaLengkap' => 'required|string|max:255',
            'role' => 'required|in:admin,user,petugas',
            'alamat' => 'nullable|string|max:500',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'NamaLengkap' => $validatedData['NamaLengkap'],
            'role' => $validatedData['role'],
            'alamat' => $validatedData['alamat'] ?? null,
        ]);
        return redirect()->route('MDA')->with('success', 'Akun berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.akun.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'NamaLengkap' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $id,
        'password' => 'nullable|string|min:8',
        'alamat' => 'required|string|max:500',
    ]);

    $petugas = User::findOrFail($id);

    $petugas->NamaLengkap = $validatedData['NamaLengkap'];
    $petugas->name = $validatedData['name'];
    $petugas->email = $validatedData['email'];

    if ($request->filled('password')) {
        $petugas->password = bcrypt($validatedData['password']);
    }
    $petugas->alamat = $validatedData['alamat'];
    $petugas->save();
    
    return redirect()->route('MDA')->with('success', 'Akun petugas berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();
        return redirect()->route('MDA')->with('success', 'Akun petugas berhasil dihapus.');
    }

    
}
