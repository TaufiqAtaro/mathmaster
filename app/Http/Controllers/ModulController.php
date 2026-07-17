<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Modul; 
use App\Models\Materi;
use App\Models\ProgressMateri;
use App\Models\RiwayatNilai;

class ModulController extends Controller
{
    public function index()
    {
        $data_modul = Modul::all(); 
        return view('kelola_modul', compact('data_modul'));
    }

    public function create()
    {
        return view('tambah_modul');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_modul' => 'required',
            'tingkat_kelas' => 'required',
            'deskripsi' => 'required',
            'gambar_modul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('gambar_modul')) {
            $validated['gambar_modul'] = $request->file('gambar_modul')->store('cover_modul', 'public');
        }

        Modul::create($validated);
        return redirect('/kelola-modul')->with('success', 'Modul berhasil ditambahkan!');
    }

    public function edit($id)
    {
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

        if ($request->hasFile('gambar_modul')) {
            if ($modul->gambar_modul) {
                Storage::disk('public')->delete($modul->gambar_modul);
            }
            $validated['gambar_modul'] = $request->file('gambar_modul')->store('cover_modul', 'public');
        }

        $modul->update($validated);
        return redirect('/kelola-modul')->with('success', 'Modul berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $modul_dihapus = Modul::find($id);
        $modul_dihapus->delete();
        return redirect('/kelola-modul');
    }

    // =========================================================
    // FASE 2: LOGIKA GEMBOK MATERI (GATING SYSTEM)
    // =========================================================
    public function show($id)
    {
        // Ambil data modul beserta materinya, urutkan ID dari yang terkecil
        $modul = Modul::with(['materis' => function($query) {
            $query->orderBy('id', 'asc');
        }])->findOrFail($id);
        
        $userId = auth()->id();
        
        // Ambil riwayat lulus siswa untuk semua materi di modul ini
        $materiIds = $modul->materis->pluck('id')->toArray();
        $progress = ProgressMateri::where('user_id', $userId)
                    ->whereIn('materi_id', $materiIds)
                    ->get()
                    ->keyBy('materi_id');

        // Aturan Gembok: Materi pertama selalu terbuka
        $isUnlocked = true; 
        
        foreach ($modul->materis as $materi) {
            // Pasang status gembok ke materi saat ini
            $materi->is_unlocked = $isUnlocked;
            
            // Cek apakah siswa sudah lulus materi ini?
            $status = $progress->get($materi->id);
            if ($status && $status->is_lulus) {
                $isUnlocked = true; // Kunci materi selanjutnya TERBUKA
            } else {
                $isUnlocked = false; // Kunci semua materi selanjutnya TERTUTUP
            }
        }

        // Cek apakah SEMUA materi sudah lulus untuk membuka Ujian Modul
        $semuaLulus = $modul->materis->every(function($m) use ($progress) {
            $status = $progress->get($m->id);
            return $status && $status->is_lulus;
        });

        return view('belajar', compact('modul', 'progress', 'semuaLulus'));
    }

    // =========================================================
    // FUNGSI KUIS KHUSUS PER MATERI
    // =========================================================
    public function kuisMateri($materiId)
    {
        $materi = Materi::with(['soals' => function($q) {
            $q->where('tipe_soal', 'kuis_materi');
        }])->findOrFail($materiId);
        
        return view('kuis', compact('materi'));
    }

    public function submitKuisMateri(Request $request, $materiId)
    {
        $materi = Materi::with(['soals' => function($q) {
            $q->where('tipe_soal', 'kuis_materi');
        }])->findOrFail($materiId);
        
        $soals = $materi->soals;
        $jawabanSiswa = $request->input('jawaban', []); 

        $benar = 0;
        $totalSoal = $soals->count();

        if ($totalSoal == 0) {
            return redirect('/belajar/' . $materi->modul_id)->with('error', 'Kuis belum tersedia.');
        }

        foreach ($soals as $soal) {
            if (isset($jawabanSiswa[$soal->id]) && $jawabanSiswa[$soal->id] == $soal->jawaban_benar) {
                $benar++;
            }
        }

        $nilai = round(($benar / $totalSoal) * 100);
        $isLulus = $nilai >= 70; // Standar kelulusan (bisa diubah)

        // Simpan progress kelulusan materi
        if (auth()->check() && auth()->user()->role === 'siswa') {
            ProgressMateri::updateOrCreate(
                ['user_id' => auth()->id(), 'materi_id' => $materiId],
                ['skor' => $nilai, 'is_lulus' => $isLulus]
            );
        }

        // Kita bisa pakai view 'hasil_kuis' yang dimodifikasi sedikit nantinya
        return view('hasil_kuis', compact('materi', 'soals', 'jawabanSiswa', 'nilai', 'benar', 'totalSoal', 'isLulus'));
    }

    // =========================================================
    // FUNGSI UJIAN AKHIR MODUL
    // =========================================================
    public function kuisModul($id)
    {
        $modul = Modul::with(['soals' => function($q) {
            $q->where('tipe_soal', 'ujian_modul');
        }])->findOrFail($id);
        
        return view('ujian_modul', compact('modul')); // Nanti kita buat tampilannya
    }

    public function submitKuisModul(Request $request, $id)
    {
        $modul = Modul::with(['soals' => function($q) {
            $q->where('tipe_soal', 'ujian_modul');
        }])->findOrFail($id);
        
        $soals = $modul->soals;
        $jawabanSiswa = $request->input('jawaban', []); 

        $benar = 0;
        $totalSoal = $soals->count();

        if ($totalSoal == 0) {
            return redirect('/belajar/' . $id)->with('error', 'Soal ujian belum tersedia.');
        }

        foreach ($soals as $soal) {
            if (isset($jawabanSiswa[$soal->id]) && $jawabanSiswa[$soal->id] == $soal->jawaban_benar) {
                $benar++;
            }
        }

        // Hitung nilai akhir ujian
        $nilai = round(($benar / $totalSoal) * 100);

        // Simpan ke Riwayat Nilai Utama (Untuk Rekap Admin)
        if (auth()->check() && auth()->user()->role === 'siswa') {
            RiwayatNilai::updateOrCreate(
                ['user_id' => auth()->id(), 'modul_id' => $id],
                ['skor_nilai' => $nilai] 
            );
        }

        return view('hasil_ujian', compact('modul', 'nilai', 'benar', 'totalSoal'));
    }

    // =========================================================
    // UPDATE FUNGSI REKAP DAN RIWAYAT
    // =========================================================
    public function rekapNilai()
    {
        $data_nilai = RiwayatNilai::with(['user', 'modul'])->latest()->get();
        return view('rekap_nilai', compact('data_nilai'));
    }

    public function riwayatKuis()
    {
        $riwayat = RiwayatNilai::with('modul')
                    ->where('user_id', auth()->id())
                    ->latest()
                    ->get();
        return view('riwayat_kuis', compact('riwayat'));
    }
    // =========================================================
    // FUNGSI LOBI RUANG UJIAN (BOSS RUSH)
    // =========================================================
    public function ruangUjian()
    {
        $moduls = Modul::with('materis')->get();
        $progress = ProgressMateri::where('user_id', auth()->id())->get()->keyBy('materi_id');
        $riwayatUjian = RiwayatNilai::where('user_id', auth()->id())->get()->keyBy('modul_id');

        $ujianList = $moduls->map(function($modul) use ($progress, $riwayatUjian) {
            $semuaLulus = true;
            
            // Cek apakah semua materi di modul ini sudah lulus
            if ($modul->materis->count() > 0) {
                foreach ($modul->materis as $materi) {
                    $status = $progress->get($materi->id);
                    if (!$status || !$status->is_lulus) {
                        $semuaLulus = false;
                        break;
                    }
                }
            } else {
                // Kalau modul tidak punya materi sama sekali, ujian dikunci
                $semuaLulus = false; 
            }

            $modul->is_unlocked = $semuaLulus;
            
            // Cek apakah siswa sudah pernah mengerjakan ujian ini
            $riwayat = $riwayatUjian->get($modul->id);
            $modul->skor_ujian = $riwayat ? $riwayat->skor_nilai : null;

            return $modul;
        });

        // Sortir: Yang terbuka ditaruh di atas, lalu diurutkan berdasarkan ID/Urutan modul
        $ujianList = $ujianList->sort(function($a, $b) {
            if ($a->is_unlocked == $b->is_unlocked) {
                return $a->id <=> $b->id;
            }
            return $a->is_unlocked ? -1 : 1; // -1 artinya naik ke atas
        })->values();

        return view('ruang_ujian', compact('ujianList'));
    }
}