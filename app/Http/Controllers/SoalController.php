<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Soal;
use App\Models\Materi;

class SoalController extends Controller
{
    // =================================================================
    // 1. TAMPILKAN DAFTAR SOAL (Di dalam Materi)
    // =================================================================
    public function indexMateri($materi_id)
    {
        $materi = Materi::with('modul')->findOrFail($materi_id);
        
        // Ambil soal yang tipenya kuis_materi untuk materi ini
        $soals = Soal::where('materi_id', $materi_id)
                     ->where('tipe_soal', 'kuis_materi')
                     ->latest()
                     ->get();
        
        return view('kelola_soal', compact('materi', 'soals'));
    }

    // =================================================================
    // 2. TAMBAH SOAL KUIS
    // =================================================================
    public function create(Request $request)
    {
        $materi_id = $request->query('materi_id');
        
        if (!$materi_id) {
            return redirect('/kelola-modul')->with('error', 'Silakan pilih materi terlebih dahulu.');
        }

        $materi = Materi::findOrFail($materi_id);
        return view('tambah_soal', compact('materi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'pertanyaan' => 'required|string',
            'opsi_a' => 'required|string',
            'opsi_b' => 'required|string',
            'opsi_c' => 'required|string',
            'opsi_d' => 'required|string',
            'jawaban_benar' => 'required|in:A,B,C,D',
            'pembahasan' => 'nullable|string',
        ]);

        // Otomatis set tipe soal
        $validated['tipe_soal'] = 'kuis_materi';

        Soal::create($validated);

        return redirect('/materi/' . $request->materi_id . '/soal')->with('sukses', 'Soal kuis berhasil ditambahkan!');
    }

    // =================================================================
    // 3. EDIT SOAL KUIS
    // =================================================================
    public function edit($id)
    {
        $soal = Soal::findOrFail($id);
        return view('edit_soal', compact('soal'));
    }

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

        return redirect('/materi/' . $soal->materi_id . '/soal')->with('sukses', 'Soal kuis berhasil diperbarui!');
    }

    // =================================================================
    // 4. HAPUS SOAL KUIS
    // =================================================================
    public function destroy($id)
    {
        $soal = Soal::findOrFail($id);
        $materi_id = $soal->materi_id; 
        
        $soal->delete();

        return redirect('/materi/' . $materi_id . '/soal')->with('sukses', 'Soal berhasil dihapus!');
    }
}