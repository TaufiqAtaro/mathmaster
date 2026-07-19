@extends('layouts.master')

@section('title', 'Hasil Kuis - ' . $materi->judul_materi)

@section('back_url', '/belajar/' . $materi->modul_id)
@section('back_text', 'Kembali ke Ruang Belajar')

@section('content')
    <div class="p-4 md:p-8">
        <div class="max-w-3xl mx-auto">
            <!-- Kartu Skor -->
            <div class="bg-white p-8 md:p-12 rounded-3xl shadow-lg border-t-8 {{ $nilai >= 70 ? 'border-green-500' : 'border-red-500' }} text-center mb-10">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Skor Kuis Materi</h1>
                
                <div class="text-8xl font-black {{ $nilai >= 70 ? 'text-green-500' : 'text-red-500' }} mb-6 drop-shadow-sm">
                    {{ $nilai }}
                </div>
                
                @if($nilai >= 70)
                    <div class="bg-green-50 text-green-700 p-5 rounded-2xl inline-block mb-6 border border-green-200">
                        <p class="font-bold text-xl flex justify-center items-center gap-2">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Selamat! Kamu Lulus!
                        </p>
                        <p class="text-sm mt-1 font-medium">Gembok materi selanjutnya sudah berhasil terbuka.</p>
                    </div>
                @else
                    <div class="bg-red-50 text-red-700 p-5 rounded-2xl inline-block mb-6 border border-red-200">
                        <p class="font-bold text-xl flex justify-center items-center gap-2">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            Yah, Belum Lulus
                        </p>
                        <p class="text-sm mt-1 font-medium">Dapatkan nilai minimal 70 untuk membuka materi berikutnya.</p>
                    </div>
                @endif
                
                <p class="text-gray-600 font-medium text-lg mb-8">Kamu menjawab <span class="font-bold text-gray-900">{{ $benar }}</span> dari <span class="font-bold text-gray-900">{{ $totalSoal }}</span> soal dengan benar.</p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="/belajar/{{ $materi->modul_id }}" class="inline-flex justify-center items-center bg-gray-100 text-gray-700 font-bold px-8 py-3.5 rounded-xl hover:bg-gray-200 transition">
                        Kembali ke Modul
                    </a>
                    @if($nilai < 70)
                        <a href="/materi/{{ $materi->id }}/kuis" class="inline-flex justify-center items-center bg-purple-600 text-white font-bold px-8 py-3.5 rounded-xl hover:bg-purple-700 transition shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                            Coba Ulang Kuis
                        </a>
                    @endif
                </div>
            </div>
            
            <div class="text-center text-gray-400 text-sm">
                <p>Kunci jawaban tidak ditampilkan agar kamu bisa terus melatih pemahamanmu.</p>
            </div>
        </div>
    </div>
@endsection