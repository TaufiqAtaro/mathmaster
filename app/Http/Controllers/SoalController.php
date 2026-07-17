<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Modul;
use App\Models\Materi;

class SoalController extends Controller
{
    public function create()
    {
        // Ambil data modul sekalian bawa data materinya
        $data_modul = Modul::with('materis')->get(); 
        return view('tambah_soal', compact('data_modul'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'modul_id' => 'required',
            'tipe_soal' => 'required|in:kuis_materi,ujian_modul', // Kuis materi atau ujian boss?
            'materi_id' => 'nullable|required_if:tipe_soal,kuis_materi', // Wajib diisi kalau pilih kuis materi
            'pertanyaan' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'jawaban_benar' => 'required|in:a,b,c,d',
            'pembahasan' => 'nullable'
        ]);

        Soal::create($validated);

        return redirect('/kelola-modul')->with('success', 'Soal baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        $data_modul = Modul::with('materis')->get(); 
        
        return view('edit_soal', compact('soal', 'data_modul'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'modul_id' => 'required',
            'tipe_soal' => 'required|in:kuis_materi,ujian_modul',
            'materi_id' => 'nullable|required_if:tipe_soal,kuis_materi',
            'pertanyaan' => 'required',
            'opsi_a' => 'required',
            'opsi_b' => 'required',
            'opsi_c' => 'required',
            'opsi_d' => 'required',
            'jawaban_benar' => 'required|in:a,b,c,d',
            'pembahasan' => 'nullable'
        ]);

        // Kalau tipe soalnya diubah jadi ujian akhir, maka materi_id harus dikosongkan
        if ($validated['tipe_soal'] == 'ujian_modul') {
            $validated['materi_id'] = null;
        }

        $soal = Soal::findOrFail($id);
        $soal->update($validated);

        return redirect('/kelola-modul')->with('success', 'Soal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect('/kelola-modul')->with('success', 'Soal berhasil dihapus!');
    }
}