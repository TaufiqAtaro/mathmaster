<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Modul;

class SoalController extends Controller
{
    // Menampilkan form tambah soal
    public function create()
    {
        $data_modul = Modul::all(); 
        return view('tambah_soal', compact('data_modul'));
    }

    // Menyimpan soal ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'modul_id' => 'required',
            'pertanyaan' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'jawaban_benar' => 'required|in:a,b,c,d', // Validasi ketat, hanya boleh huruf a/b/c/d
            'pembahasan' => 'nullable' // Boleh dikosongkan
        ]);

        Soal::create($validated);

        return redirect('/kelola-modul')->with('success', 'Soal kuis baru berhasil ditambahkan!');
    }
    // Menampilkan form edit soal
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        $data_modul = Modul::all(); 
        
        return view('edit_soal', compact('soal', 'data_modul'));
    }

    // Memproses update data soal
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'modul_id' => 'required',
            'pertanyaan' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'jawaban_benar' => 'required|in:a,b,c,d',
            'pembahasan' => 'nullable'
        ]);

        $soal = Soal::findOrFail($id);
        $soal->update($validated);

        return redirect('/kelola-modul')->with('success', 'Soal kuis berhasil diperbarui!');
    }

    // Menghapus soal
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect('/kelola-modul')->with('success', 'Soal kuis berhasil dihapus!');
    }
}