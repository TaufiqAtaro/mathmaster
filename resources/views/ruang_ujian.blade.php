@extends('layouts.master')
@section('title', 'Ruang Ujian')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <div class="mb-10 text-center">
        <h1 class="text-4xl font-black text-gray-900 mb-4">Ruang Ujian Akhir</h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Selesaikan semua materi pada modul di Ruang Kelas untuk membuka akses Ujian Akhir (Boss Fight) di sini.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($ujianList as $modul)
            @if($modul->is_unlocked)
                <!-- KARTU UJIAN TERBUKA -->
                <div class="bg-white rounded-3xl shadow-sm border {{ $modul->skor_ujian !== null ? 'border-green-300' : 'border-indigo-300' }} p-6 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden group">
                    
                    @if($modul->skor_ujian !== null)
                        <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-4 py-1.5 rounded-bl-xl shadow-sm">
                            Selesai
                        </div>
                    @endif

                    <div>
                        <div class="flex items-center gap-3 mb-3 mt-2">
                            <span class="bg-indigo-100 text-indigo-700 w-12 h-12 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                            </span>
                            <h3 class="text-xl font-bold text-gray-900">Ujian: {{ $modul->judul_modul }}</h3>
                        </div>
                        <p class="text-gray-500 text-sm mb-6">Kelas {{ $modul->tingkat_kelas }} • Akses ujian telah terbuka!</p>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-100 pt-5">
                        @if($modul->skor_ujian !== null)
                            <div>
                                <p class="text-xs text-gray-500 font-bold uppercase mb-1">Skor Terakhir</p>
                                <p class="text-2xl font-black {{ $modul->skor_ujian >= 70 ? 'text-green-500' : 'text-red-500' }}">{{ $modul->skor_ujian }}</p>
                            </div>
                            <a href="/modul/{{ $modul->id }}/ujian" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2.5 px-6 rounded-xl transition text-sm">
                                Kerjakan Ulang
                            </a>
                        @else
                            <div>
                                <p class="text-xs text-green-700 font-bold bg-green-100 px-3 py-1.5 rounded-lg border border-green-200">Siap Dikerjakan</p>
                            </div>
                            <a href="/modul/{{ $modul->id }}/ujian" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-6 rounded-xl transition text-sm shadow">
                                Mulai Ujian
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <!-- KARTU UJIAN TERKUNCI -->
                <div class="bg-gray-50 rounded-3xl border border-gray-200 p-6 flex flex-col justify-between relative">
                    <div class="opacity-40 blur-[2px] select-none pointer-events-none">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-gray-200 text-gray-500 w-12 h-12 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </span>
                            <h3 class="text-xl font-bold text-gray-800">Ujian: {{ $modul->judul_modul }}</h3>
                        </div>
                        <p class="text-gray-500 text-sm mb-6">Kelas {{ $modul->tingkat_kelas }}</p>
                    </div>

                    <!-- Overlay Gembok -->
                    <div class="absolute inset-0 flex items-center justify-center z-10">
                        <div class="bg-white/95 backdrop-blur-sm px-5 py-3 rounded-xl border border-gray-200 text-center shadow-sm flex flex-col items-center">
                            <svg class="w-6 h-6 text-gray-400 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            <p class="text-xs font-bold text-gray-600">Selesaikan Materi Dulu</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @if($ujianList->count() == 0)
        <div class="text-center bg-gray-50 border border-gray-200 rounded-3xl p-12 mt-6">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
            <p class="text-gray-500 font-medium">Belum ada modul ujian yang tersedia saat ini.</p>
        </div>
    @endif
</div>
@endsection