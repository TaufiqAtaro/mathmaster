@extends('layouts.master')
@section('title', 'Hasil Ujian Akhir')

@section('back_url', '/belajar/' . $materi->modul_id)
@section('back_text', 'Kembali ke Ruang Belajar')

@section('content')
    <div class="p-4 md:p-8">
        <div class="max-w-3xl mx-auto">
            <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border-t-8 border-indigo-600 text-center mb-10 relative overflow-hidden">
                
                <h1 class="text-3xl font-black text-gray-800 mb-2">Nilai Ujian Akhir Modul</h1>
                <p class="text-gray-500 font-medium text-lg mb-8">{{ $modul->judul_modul }}</p>
                
                <div class="w-48 h-48 mx-auto rounded-full border-8 border-indigo-100 flex items-center justify-center mb-6 shadow-inner relative">
                    <div class="absolute inset-0 rounded-full border-t-8 border-indigo-600 opacity-20"></div>
                    <span class="text-7xl font-black text-indigo-600">{{ $nilai }}</span>
                </div>
                
                <div class="bg-indigo-50 text-indigo-800 p-4 rounded-xl inline-block mb-8 border border-indigo-100">
                    <p class="font-bold text-lg">Ujian Selesai! 🎉</p>
                    <p class="text-sm mt-1">Skor akhirmu telah berhasil disimpan ke dalam rekap guru.</p>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/modul" class="inline-flex justify-center items-center bg-gray-100 text-gray-700 font-bold px-8 py-3 rounded-xl hover:bg-gray-200 transition">
                        Kembali ke Daftar Modul
                    </a>
                    <a href="/riwayat-kuis" class="inline-flex justify-center items-center bg-indigo-600 text-white font-bold px-8 py-3 rounded-xl hover:bg-indigo-700 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Lihat Riwayat Nilaiku
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection