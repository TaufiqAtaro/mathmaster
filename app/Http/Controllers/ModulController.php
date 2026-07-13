<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Modul; // Wajib dipanggil agar Controller kenal Model-nya

class ModulController extends Controller
{
    public function index()
    {
        // Cuma 1 baris ini pengganti "SELECT * FROM moduls"!
        $data_modul = Modul::all(); 
        
        // Lempar datanya ke file view yang bernama 'modul'
        return view('kelola_modul', compact('data_modul'));
    }

    public function create ()
    {
        return view('tambah_modul');
    }
    public function store(Request $request)
{
    // 1. Validasi data (termasuk ngecek apakah file yang diupload beneran gambar, max 2MB)
    $validated = $request->validate([
        'judul_modul' => 'required',
        'tingkat_kelas' => 'required',
        'deskripsi' => 'required',
        'gambar_modul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // 2. Cek apakah admin mengunggah file gambar
    if ($request->hasFile('gambar_modul')) {
        // Simpan gambar ke dalam folder: storage/app/public/cover_modul
        $path = $request->file('gambar_modul')->store('cover_modul', 'public');
        // Masukkan path/alamat gambarnya ke dalam array data yang akan disimpan
        $validated['gambar_modul'] = $path;
    }

    // 3. Simpan semua data ke database
    Modul::create($validated);

    return redirect('/kelola-modul')->with('success', 'Modul berhasil ditambahkan!');
}

    public function destroy($id)
{
    // 1. Cari data modul yang ID-nya sesuai
    $modul_dihapus = Modul::find($id);
    
    // 2. Hancurkan dari database!
    $modul_dihapus->delete();
    
    // 3. Tendang kembali ke halaman daftar modul
    return redirect('/kelola-modul');
}
    
    public function edit($id)
{
    // Cari modul berdasarkan ID lalu lempar ke file view 'edit_modul'
    $modul_edit = Modul::find($id);
    return view('edit_modul', compact('modul_edit'));
}

    public function update(Request $request, $id)
{
    $modul = Modul::findOrFail($id);
    
    $validated = $request->validate([
        'judul_modul' => 'required',
        'tingkat_kelas' => 'required',
        'deskripsi' => 'required',
        'gambar_modul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Jika admin mengupload gambar baru
    if ($request->hasFile('gambar_modul')) {
        // Hapus gambar lama dari server (agar tidak numpuk)
        if ($modul->gambar_modul) {
            Storage::disk('public')->delete($modul->gambar_modul);
        }
        // Simpan gambar baru
        $validated['gambar_modul'] = $request->file('gambar_modul')->store('cover_modul', 'public');
    }

    $modul->update($validated);

    return redirect('/kelola-modul')->with('success', 'Modul berhasil diperbarui!');
}
    public function show($id)
{
    // Ambil data modul beserta seluruh materinya
    $modul = Modul::with('materis')->findOrFail($id);
    
    // Kirim datanya ke halaman 'belajar'
    return view('belajar', compact('modul'));
}
}