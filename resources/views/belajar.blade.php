@extends('layouts.master')

@section('title', 'Belajar ' . $modul->judul_modul)

@section('back_url', '/modul')
@section('back_text', 'Kembali ke Daftar Modul')

@section('content')
    <!-- Inject MathJax untuk memproses rumus LaTeX siswa -->
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header Modul -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8 mb-8 text-center border-t-8 border-purple-500">
            <span class="inline-block bg-purple-100 text-purple-700 px-4 py-1.5 rounded-full text-xs font-black mb-4 uppercase tracking-widest">
                Kelas {{ $modul->tingkat_kelas }}
            </span>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $modul->judul_modul }}</h1>
            <p class="text-lg text-gray-600">{{ $modul->deskripsi }}</p>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
            <svg class="w-7 h-7 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
            Materi Pembelajaran
        </h2>

        <div class="space-y-6">
            @forelse($modul->materis as $index => $materi)
                @php
                    $status = $progress->get($materi->id);
                    $nilai = $status ? $status->skor : null;
                @endphp

                @if($materi->is_unlocked)
                    {{-- TAMPILAN MATERI TERBUKA --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                        <div class="flex flex-col md:flex-row justify-between md:items-start mb-6 gap-4">
                            <h3 class="text-xl font-bold text-purple-800 flex items-start">
                                <span class="text-purple-400 mr-2">#{{ $index + 1 }}</span> {{ $materi->judul_materi }}
                            </h3>
                            @if($status && $status->is_lulus)
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1.5 rounded-full border border-green-200 flex items-center gap-1.5 shrink-0">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg>
                                    Lulus (Skor: {{ $nilai }})
                                </span>
                            @endif
                        </div>
                        
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line mb-6">
                            {{ $materi->isi_materi }}
                        </div>

                        <!-- Video Pemutar File Lokal -->
                        @if($materi->link_video)
                            <div class="w-full rounded-2xl overflow-hidden border border-gray-200 mb-6 bg-black shadow-inner">
                                <video controls class="w-full h-auto max-h-[500px]" controlsList="nodownload">
                                    <source src="{{ asset('storage/' . $materi->link_video) }}" type="video/mp4">
                                    <source src="{{ asset('storage/' . $materi->link_video) }}" type="video/webm">
                                    Maaf, browser Anda tidak mendukung pemutar video ini.
                                </video>
                            </div>
                        @endif

                        <!-- Lampiran -->
                        @if($materi->file_lampiran)
                            <div class="mb-6">
                                <a href="{{ asset('storage/' . $materi->file_lampiran) }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 hover:bg-blue-100 px-5 py-3 rounded-xl font-bold text-sm border border-blue-200 transition">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                                    Buka Lampiran Materi
                                </a>
                            </div>
                        @endif

                        <!-- Tombol Kuis Materi -->
                        <div class="border-t border-gray-100 pt-5 mt-2">
                            <a href="/materi/{{ $materi->id }}/kuis" class="flex justify-center items-center gap-2 bg-purple-100 hover:bg-purple-200 text-purple-700 font-bold px-6 py-3.5 rounded-xl transition w-full text-center">
                                @if($status && $status->is_lulus)
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                                    Ulangi Kuis Materi (Skor: {{ $nilai }})
                                @else
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    Kerjakan Kuis Materi Ini
                                @endif
                            </a>
                        </div>
                    </div>
                @else
                    {{-- TAMPILAN MATERI TERKUNCI (GEMBOK) --}}
                    <div class="bg-gray-50 rounded-2xl shadow-sm border border-gray-200 p-6 relative overflow-hidden">
                        <!-- Teks disamarkan -->
                        <div class="opacity-30 pointer-events-none blur-[3px] select-none">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                <span class="text-gray-400 mr-2">#{{ $index + 1 }}</span> {{ $materi->judul_materi }}
                            </h3>
                            <div class="h-20 bg-gray-300 rounded-xl animate-pulse w-full mb-2"></div>
                            <div class="h-10 bg-gray-300 rounded-xl animate-pulse w-3/4"></div>
                        </div>
                        
                        <!-- Overlay Gembok Besar -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 bg-white/40 backdrop-blur-[1px]">
                            <div class="w-16 h-16 bg-white text-gray-400 rounded-full flex items-center justify-center shadow-md mb-3 border border-gray-200">
                                <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                            </div>
                            <h4 class="font-bold text-gray-800 text-lg">Materi Terkunci</h4>
                            <p class="text-gray-600 text-sm mt-1 max-w-sm font-medium">Selesaikan kuis di materi sebelumnya dengan nilai minimal 70 untuk membuka materi ini.</p>
                        </div>
                    </div>
                @endif
            @empty
                <div class="bg-yellow-50 text-yellow-700 p-6 rounded-2xl border border-yellow-200 text-center font-medium flex items-center justify-center gap-3">
                    <svg class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    Belum ada materi untuk modul ini.
                </div>
            @endforelse
        </div>

        <!-- AREA UJIAN AKHIR MODUL -->
        @if($modul->materis->count() > 0)
            <div class="mt-12 mb-4 p-8 rounded-3xl border-2 text-center relative overflow-hidden {{ $semuaLulus ? 'bg-indigo-50 border-indigo-200 shadow-sm' : 'bg-gray-50 border-dashed border-gray-300' }}">
                
                @if($semuaLulus)
                    <div class="absolute -right-10 -top-10 w-32 h-32 bg-indigo-100 rounded-full opacity-50"></div>
                    <div class="absolute -left-10 -bottom-10 w-24 h-24 bg-blue-100 rounded-full opacity-50"></div>
                @endif

                <h3 class="text-2xl font-black mb-3 relative z-10 {{ $semuaLulus ? 'text-indigo-900' : 'text-gray-500' }}">Ujian Akhir Modul (Boss Fight)</h3>
                
                @if($semuaLulus)
                    <p class="text-indigo-700 mb-6 relative z-10 font-medium">Luar biasa! Kamu sudah menguasai semua materi. Siap untuk Boss Fight?</p>
                    <a href="/modul/{{ $modul->id }}/ujian" class="relative z-10 inline-flex items-center justify-center gap-3 bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-black text-xl py-4 px-10 rounded-2xl hover:from-indigo-700 hover:to-blue-700 shadow-xl hover:shadow-indigo-500/30 transition-all transform hover:-translate-y-1">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                        Mulai Ujian Akhir
                    </a>
                @else
                    <p class="text-gray-500 mb-6 relative z-10 font-medium">Selesaikan dan lulus semua kuis materi di atas untuk membuka Ujian Akhir ini.</p>
                    <button disabled class="relative z-10 inline-flex items-center justify-center gap-3 bg-gray-200 text-gray-400 font-black text-xl py-4 px-10 rounded-2xl cursor-not-allowed">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        Ujian Terkunci
                    </button>
                @endif
            </div>
        @endif
    </div>
@endsection