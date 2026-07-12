<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Modul; // Panggil juga Modul agar bisa ambil data untuk dropdown

class MateriController extends Controller
{
    public function create()
    {
        // Ambil semua data modul untuk ditampilkan di dropdown pilihan
        $data_modul = Modul::all();
        return view('tambah_materi', compact('data_modul'));
    }

    public function store(Request $request)
    {
        $materi_baru = new Materi;
        $materi_baru->modul_id = $request->modul_id; // Ini tali pengikatnya!
        $materi_baru->judul_materi = $request->judul_materi;
        $materi_baru->isi_materi = $request->isi_materi;
        $materi_baru->save();

        // Setelah sukses, sementara kita kembalikan lagi ke halaman form ini
        return redirect('/materi/tambah'); 
    }
}