@extends('layouts.master')

@section('title', 'Belajar ' . $modul->judul_modul)

@section('back_url', '/modul')
@section('back_text', 'Kembali ke Daftar Modul')

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header Modul -->
        <div class="bg-white rounded-2xl shadow-sm border p-8 mb-8 text-center border-t-8 border-purple-500">
            <span class="inline-block bg-purple-100 text-purple-700 px-4 py-1 rounded-full text-sm font-bold mb-4 uppercase tracking-widest">Kelas {{ $modul->tingkat_kelas }}</span>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $modul->judul_modul }}</h1>
            <p class="text-lg text-gray-600">{{ $modul->deskripsi }}</p>
        </div>

        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            Materi Pembelajaran
        </h2>

        <div class="space-y-6">
            @forelse($modul->materis as $index => $materi)
                @php
                    // Mengecek nilai siswa di materi ini dari controller
                    $status = $progress->get($materi->id);
                    $nilai = $status ? $status->skor : null;
                @endphp

                <!-- Cek Status Gembok -->
                @if($materi->is_unlocked)
                    {{-- TAMPILAN MATERI TERBUKA --}}
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-purple-800 flex items-start">
                                <span class="text-purple-400 mr-2">#{{ $index + 1 }}</span> {{ $materi->judul_materi }}
                            </h3>
                            @if($status && $status->is_lulus)
                                <span class="bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full border border-green-200 flex items-center gap-1">
                                    ✅ Lulus (Skor: {{ $nilai }})
                                </span>
                            @endif
                        </div>
                        
                        <div class="text-gray-700 leading-relaxed whitespace-pre-line mb-6">
                            {{ $materi->isi_materi }}
                        </div>

                        <!-- Video YouTube -->
                        @if($materi->link_video)
                            @php
                                $embedUrl = str_replace('watch?v=', 'embed/', $materi->link_video);
                            @endphp
                            <div class="w-full rounded-xl overflow-hidden border border-gray-200 mb-4 shadow-inner">
                                <iframe src="{{ $embedUrl }}" class="w-full h-64 md:h-96" frameborder="0" allowfullscreen></iframe>
                            </div>
                        @endif

                        <!-- Lampiran -->
                        @if($materi->file_lampiran)
                            <div class="mb-6">
                                <a href="{{ asset('storage/' . $materi->file_lampiran) }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 hover:bg-blue-100 px-5 py-2.5 rounded-lg font-bold text-sm border border-blue-200 transition">
                                    📎 Buka Lampiran
                                </a>
                            </div>
                        @endif

                        <!-- Tombol Kuis Materi -->
                        <div class="border-t border-gray-100 pt-4 mt-4">
                            <a href="/materi/{{ $materi->id }}/kuis" class="inline-block bg-purple-100 hover:bg-purple-200 text-purple-700 font-bold px-6 py-2.5 rounded-lg transition w-full text-center">
                                @if($status && $status->is_lulus)
                                    Ulangi Kuis Materi (Skor: {{ $nilai }})
                                @else
                                    📝 Kerjakan Kuis Materi Ini
                                @endif
                            </a>
                        </div>
                    </div>
                @else
                    {{-- TAMPILAN MATERI TERKUNCI (GEMBOK) --}}
                    <div class="bg-gray-50 rounded-xl shadow-sm border border-gray-200 p-6 relative overflow-hidden">
                        <!-- Teks disamarkan -->
                        <div class="opacity-30 pointer-events-none blur-[2px]">
                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                <span class="text-gray-400 mr-2">#{{ $index + 1 }}</span> {{ $materi->judul_materi }}
                            </h3>
                            <div class="h-20 bg-gray-200 rounded animate-pulse w-full mb-2"></div>
                            <div class="h-10 bg-gray-200 rounded animate-pulse w-3/4"></div>
                        </div>
                        
                        <!-- Overlay Gembok Besar -->
                        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4">
                            <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center text-3xl shadow-md mb-3 border border-gray-200">
                                🔒
                            </div>
                            <h4 class="font-bold text-gray-800 text-lg">Materi Terkunci</h4>
                            <p class="text-gray-600 text-sm mt-1 max-w-sm">Selesaikan kuis di materi sebelumnya dengan nilai minimal 70 untuk membuka materi ini.</p>
                        </div>
                    </div>
                @endif
            @empty
                <div class="bg-yellow-50 text-yellow-700 p-6 rounded-xl border border-yellow-200 text-center font-medium">
                    Belum ada materi untuk modul ini.
                </div>
            @endforelse
        </div>

        <!-- AREA UJIAN AKHIR MODUL -->
        @if($modul->materis->count() > 0)
            <div class="mt-12 mb-4 p-8 rounded-2xl border-2 text-center {{ $semuaLulus ? 'bg-indigo-50 border-indigo-300' : 'bg-gray-50 border-dashed border-gray-300' }}">
                <h3 class="text-2xl font-bold mb-3 {{ $semuaLulus ? 'text-indigo-900' : 'text-gray-500' }}">Ujian Akhir Modul</h3>
                
                @if($semuaLulus)
                    <p class="text-indigo-700 mb-6">Luar biasa! Kamu sudah menguasai semua materi. Siap untuk boss fight?</p>
                    <a href="/modul/{{ $modul->id }}/ujian" class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-black text-xl py-4 px-10 rounded-2xl hover:from-indigo-700 hover:to-blue-700 shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1">
                        🚀 Mulai Ujian Akhir
                    </a>
                @else
                    <p class="text-gray-500 mb-6">Selesaikan dan lulus semua kuis materi di atas untuk membuka Ujian Akhir ini.</p>
                    <button disabled class="inline-flex items-center justify-center gap-3 bg-gray-300 text-gray-500 font-black text-xl py-4 px-10 rounded-2xl cursor-not-allowed">
                        🔒 Ujian Terkunci
                    </button>
                @endif
            </div>
        @endif
    </div>
@endsection