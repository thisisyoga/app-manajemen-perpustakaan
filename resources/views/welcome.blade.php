{{-- bikin kode_peminjaman --}}

{{-- $tanggal = Carbon::now()->format('Ymd');
    $kode = "AKS-" . $tanggal . "-";

    do {
        $angkarandom = rand(1, 9999);
        $fullCode = $kode . $angkarandom;
    } while (Peminjaman::where('kode_pinjam', $fullCode)->exists());

    Peminjaman::create([
        'kode_pinjam' => $fullCode,
        'user_id' => auth()->id(),
    ]);

    return redirect()->back()->with('success', 'Berhasil meminjam dengan kode: ' . $fullCode);
} --}}

    
{{-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    <div class="group">
    <label class="block text-[10px] font-bold uppercase tracking-widest text-Chocolate/50 mb-1 ml-1">Foto Diri</label>
    <div class="relative">
        <input name="foto" type="file" accept="image/*"
            class="custom-input w-full px-4 py-2 bg-beige/20 border-2 border-transparent rounded-xl transition-all text-xs font-medium file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-[10px] file:font-bold file:uppercase file:bg-Chocolate file:text-white hover:file:bg-DarkChocolate @error('foto') input-error @enderror">
    </div>
    @error('foto') <span class="text-[10px] text-red-500 font-semibold ml-1">{{ $message }}</span> @enderror
</div>
</form>

protected function validator(array $data)
{
    return Validator::make($data, [
        'NamaLengkap' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'foto' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'], // Tambahkan ini
    ]);
}

protected function create(array $data)
{
    $path = null;

    if (request()->hasFile('foto')) {
        // Simpan ke folder storage/app/public/profil
        $path = request()->file('foto')->store('profil', 'public');
    }

    return User::create([
        'NamaLengkap' => $data['NamaLengkap'],
        'name' => $data['name'],
        'email' => $data['email'],
        'alamat' => $data['alamat'],
        'password' => Hash::make($data['password']),
        'foto' => $path, // Simpan path-nya ke database
        'role' => 'user',
    ]);
}

$table->string('foto')->nullable(); --}}