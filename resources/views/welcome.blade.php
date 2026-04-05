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