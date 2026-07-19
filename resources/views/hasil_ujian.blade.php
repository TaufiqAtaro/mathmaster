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
                
                <div class="w-48 h-48 mx-auto rounded-full border-8 border-indigo-50 flex items-center justify-center mb-6 shadow-inner relative">
                    <div class="absolute inset-0 rounded-full border-t-8 border-indigo-600 opacity-20"></div>
                    <span class="text-7xl font-black text-indigo-600">{{ $nilai }}</span>
                </div>
                
                <div class="bg-indigo-50 text-indigo-800 p-5 rounded-2xl inline-block mb-8 border border-indigo-100">
                    <p class="font-bold text-lg flex justify-center items-center gap-2">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        Ujian Selesai!
                    </p>
                    <p class="text-sm mt-1 font-medium">Skor akhirmu telah berhasil disimpan ke dalam rekap guru.</p>
                </div>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/modul" class="inline-flex justify-center items-center bg-gray-100 text-gray-700 font-bold px-8 py-3.5 rounded-xl hover:bg-gray-200 transition">
                        Kembali ke Daftar Modul
                    </a>
                    <a href="/riwayat-kuis" class="inline-flex justify-center items-center bg-indigo-600 text-white font-bold px-8 py-3.5 rounded-xl hover:bg-indigo-700 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                        Lihat Riwayat Nilaiku
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection