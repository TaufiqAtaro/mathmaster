<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modul;
use App\Models\Soal;

class UjianAdminController extends Controller
{
    // Tampilkan daftar modul (halaman depan)
    public function index()
    {
        $data_modul = Modul::latest()->get();
        return view('kelola_ujian', compact('data_modul'));
    }

    // Tampilkan daftar soal di dalam modul tersebut
    public function show($modul_id)
    {
        $modul = Modul::findOrFail($modul_id);
        
        $soals = Soal::where('modul_id', $modul_id)
                     ->where('tipe_soal', 'ujian_modul')
                     ->latest()
                     ->get();
                     
        return view('soal_ujian', compact('modul', 'soals'));
    }

    // Tampilkan form tambah soal ujian
    public function create(Request $request)
    {
        $modul_id = $request->query('modul_id');
        
        if (!$modul_id) {
            return redirect('/kelola-ujian')->with('error', 'Pilih modul terlebih dahulu.');
        }

        $modul = Modul::findOrFail($modul_id);
        return view('tambah_soal_ujian', compact('modul'));
    }

    // Simpan soal ujian
    public function store(Request $request)
    {
        $validated = $request->validate([
            'modul_id' => 'required|exists:moduls,id',
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|in:A,B,C,D',
            'pembahasan' => 'nullable|string',
        ]);

        // Otomatis set tipe soal menjadi ujian_modul (Boss Fight)
        $validated['tipe_soal'] = 'ujian_modul';

        Soal::create($validated);

        return redirect('/kelola-ujian/' . $request->modul_id)->with('sukses', 'Soal Ujian berhasil ditambahkan!');
    }

    // Tampilkan form edit soal ujian
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        return view('edit_soal_ujian', compact('soal'));
    }

    // Update soal ujian
    public function update(Request $request, $id)
    {
        $soal = Soal::findOrFail($id);

        $validated = $request->validate([
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|in:A,B,C,D',
            'pembahasan' => 'nullable|string',
        ]);

        $soal->update($validated);

        return redirect('/kelola-ujian/' . $soal->modul_id)->with('sukses', 'Soal Ujian berhasil diperbarui!');
    }

    // Hapus soal ujian
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $modul_id = $soal->modul_id; 
        
        $soal->delete();

        return redirect('/kelola-ujian/' . $modul_id)->with('sukses', 'Soal Ujian berhasil dihapus!');
    }
}