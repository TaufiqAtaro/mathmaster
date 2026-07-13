<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Materi;
use App\Models\Modul; 


class MateriController extends Controller
{
    // 1. Fungsi untuk menampilkan form tambah materi
    public function create()
    {
        $data_modul = Modul::all(); 
        
        return view('tambah_materi', compact('data_modul'));
    }

// 2. Fungsi untuk menyimpan data ke database (beserta file)
public function store(Request $request)
{
    $validated = $request->validate([
        'modul_id' => 'required',
        'judul_materi' => 'required',
        'isi_materi' => 'required',
        'file_lampiran' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120',
        'link_video' => 'nullable|url'
    ]);

    if ($request->hasFile('file_lampiran')) {
        $validated['file_lampiran'] = $request->file('file_lampiran')->store('lampiran_materi', 'public');
    }

    Materi::create($validated);

    return redirect('/kelola-modul')->with('success', 'Materi baru berhasil ditambahkan!');
}
public function edit($id)
{
    $materi = Materi::findOrFail($id);
    $data_modul = Modul::all(); 
    
    return view('edit_materi', compact('materi', 'data_modul'));
}

public function update(Request $request, $id)
{
    $validated = $request->validate([
        'modul_id' => 'required',
        'judul_materi' => 'required',
        'isi_materi' => 'required',
        'file_lampiran' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120',
        'link_video' => 'nullable|url'
    ]);

    $materi = Materi::findOrFail($id);

    // Jika ada upload file baru
    if ($request->hasFile('file_lampiran')) {
        // Hapus file lama jika ada
        if ($materi->file_lampiran) {
            Storage::disk('public')->delete($materi->file_lampiran);
        }
        // Simpan file baru
        $validated['file_lampiran'] = $request->file('file_lampiran')->store('lampiran_materi', 'public');
    }

    $materi->update($validated);

    return redirect('/kelola-modul')->with('success', 'Materi berhasil diperbarui!');
}
public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        // Bersihkan dulu file fisiknya dari folder penyimpanan jika ada
        if ($materi->file_lampiran) {
            Storage::disk('public')->delete($materi->file_lampiran);
        }

        // Setelah filenya hilang, baru hapus datanya dari database
        $materi->delete();

        return redirect('/kelola-modul')->with('success', 'Materi beserta filenya berhasil dihapus bersih!');
    }
}