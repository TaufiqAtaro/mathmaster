<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Materi;
use App\Models\Modul; 

class MateriController extends Controller
{
    // =================================================================
    // 1. TAMPILKAN DAFTAR MATERI (Di dalam Modul)
    // =================================================================
    public function indexModul($modul_id)
    {
        $modul = Modul::findOrFail($modul_id);
        $materis = Materi::where('modul_id', $modul_id)->latest()->get();
        
        return view('kelola_materi', compact('modul', 'materis'));
    }

    // =================================================================
    // 2. TAMBAH MATERI
    // =================================================================
    public function create(Request $request)
    {
        $modul_id = $request->query('modul_id');
        
        if (!$modul_id) {
            return redirect('/kelola-modul')->with('error', 'Silakan pilih modul terlebih dahulu.');
        }

        return view('tambah_materi', compact('modul_id'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'modul_id' => 'required|exists:moduls,id',
            'judul_materi' => 'required|string|max:255',
            'isi_materi' => 'required|string',
            'file_lampiran' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120',
            // Ubah link_video menjadi format upload file video (maksimal 50MB)
            'link_video' => 'nullable|mimes:mp4,mov,avi,webm|max:51200'
        ]);

        if ($request->hasFile('file_lampiran')) {
            $validated['file_lampiran'] = $request->file('file_lampiran')->store('lampiran_materi', 'public');
        }

        if ($request->hasFile('link_video')) {
            $validated['link_video'] = $request->file('link_video')->store('video_materi', 'public');
        }

        Materi::create($validated);

        return redirect('/kelola-modul/' . $request->modul_id . '/materi')->with('sukses', 'Materi baru berhasil ditambahkan!');
    }

    // =================================================================
    // 3. EDIT MATERI
    // =================================================================
    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        return view('edit_materi', compact('materi'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $validated = $request->validate([
            'judul_materi' => 'required|string|max:255',
            'isi_materi' => 'required|string',
            'file_lampiran' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120',
            // Ubah link_video menjadi format upload file video (maksimal 50MB)
            'link_video' => 'nullable|mimes:mp4,mov,avi,webm|max:51200'
        ]);

        if ($request->hasFile('file_lampiran')) {
            if ($materi->file_lampiran) {
                Storage::disk('public')->delete($materi->file_lampiran);
            }
            $validated['file_lampiran'] = $request->file('file_lampiran')->store('lampiran_materi', 'public');
        }

        if ($request->hasFile('link_video')) {
            if ($materi->link_video) {
                Storage::disk('public')->delete($materi->link_video);
            }
            $validated['link_video'] = $request->file('link_video')->store('video_materi', 'public');
        }

        $materi->update($validated);

        return redirect('/kelola-modul/' . $materi->modul_id . '/materi')->with('sukses', 'Materi berhasil diperbarui!');
    }

    // =================================================================
    // 4. HAPUS MATERI
    // =================================================================
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);
        $modul_id = $materi->modul_id;
        
        if ($materi->file_lampiran) {
            Storage::disk('public')->delete($materi->file_lampiran);
        }

        // Tambahkan penghapusan file video fisik
        if ($materi->link_video) {
            Storage::disk('public')->delete($materi->link_video);
        }

        $materi->delete();

        return redirect('/kelola-modul/' . $modul_id . '/materi')->with('sukses', 'Materi beserta filenya berhasil dihapus!');
    }
}