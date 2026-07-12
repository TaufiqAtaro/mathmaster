<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul; // Wajib dipanggil agar Controller kenal Model-nya

class ModulController extends Controller
{
    public function index()
    {
        // Cuma 1 baris ini pengganti "SELECT * FROM moduls"!
        $data_modul = Modul::all(); 
        
        // Lempar datanya ke file view yang bernama 'modul'
        return view('modul', compact('data_modul'));
    }

    public function create ()
    {
        return view('tambah_modul');
    }
    public function store(Request $request)
{
    // 1. Siapkan baris kosong baru di tabel Modul
    $modul_baru = new Modul;
    
    // 2. Isi kolomnya dengan data yang diketik user di form ($request)
    $modul_baru->judul_modul = $request->judul_modul;
    $modul_baru->tingkat_kelas = $request->tingkat_kelas;
    $modul_baru->deskripsi = $request->deskripsi;
    
    // 3. Simpan ke database MySQL!
    $modul_baru->save();
    
    // 4. Kalau sudah sukses, tendang user kembali ke halaman daftar modul
    return redirect('/modul');
}

    public function destroy($id)
{
    // 1. Cari data modul yang ID-nya sesuai
    $modul_dihapus = Modul::find($id);
    
    // 2. Hancurkan dari database!
    $modul_dihapus->delete();
    
    // 3. Tendang kembali ke halaman daftar modul
    return redirect('/modul');
}
    
    public function edit($id)
{
    // Cari modul berdasarkan ID lalu lempar ke file view 'edit_modul'
    $modul_edit = Modul::find($id);
    return view('edit_modul', compact('modul_edit'));
}

    public function update(Request $request, $id)
{
    // Cari modulnya, timpa isinya dengan request baru, lalu save!
    $modul_update = Modul::find($id);
    $modul_update->judul_modul = $request->judul_modul;
    $modul_update->tingkat_kelas = $request->tingkat_kelas;
    $modul_update->deskripsi = $request->deskripsi;
    $modul_update->save();

    return redirect('/modul');
    
}
    public function show($id)
{
    // Ambil data modul beserta seluruh materinya
    $modul = Modul::with('materis')->findOrFail($id);
    
    // Kirim datanya ke halaman 'belajar'
    return view('belajar', compact('modul'));
}
}