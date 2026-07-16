@extends('layouts.master')

@section('title', 'Belajar ' . $modul->judul_modul)

@section('content')
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        <!-- Header Modul -->
        <div class="bg-white rounded-2xl shadow-sm border p-8 mb-8 text-center border-t-8 border-purple-500">
            <span class="inline-block bg-purple-100 text-purple-700 px-4 py-1 rounded-full text-sm font-bold mb-4 uppercase tracking-widest">Kelas {{ $modul->tingkat_kelas }}</span>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $modul->judul_modul }}</h1>
            <p class="text-lg text-gray-600">{{ $modul->deskripsi }}</p>
        </div>

        <!-- Daftar Materi -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            Materi Pembelajaran
        </h2>

        <div class="space-y-6">
            @forelse($modul->materis as $index => $materi)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-bold text-purple-800 mb-3 flex items-start">
                        <span class="text-purple-400 mr-2">#{{ $index + 1 }}</span> {{ $materi->judul_materi }}
                    </h3>
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $materi->isi_materi }}
                    </div>
                    <!-- Area Lampiran & Video -->
                    <div class="mt-8 space-y-6">
                            
                            <!-- Tampilkan Video YouTube Jika Ada -->
                            @if($materi->link_video)
                                @php
                                    // Mengubah link YouTube biasa menjadi format Embed secara otomatis
                                    $embedUrl = str_replace('watch?v=', 'embed/', $materi->link_video);
                                @endphp
                                <div class="w-full rounded-xl overflow-hidden border border-gray-200 bg-gray-100 shadow-inner">
                                    <iframe src="{{ $embedUrl }}" class="w-full h-64 md:h-96" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            @endif

                            <!-- Tampilkan Tombol Download Jika Ada File -->
                            @if($materi->file_lampiran)
                                <div>
                                    <a href="{{ asset('storage/' . $materi->file_lampiran) }}" target="_blank" class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 hover:bg-blue-100 px-5 py-2.5 rounded-lg font-bold text-sm border border-blue-200 transition shadow-sm hover:shadow">
                                        <span>📎</span> Buka / Unduh Lampiran Materi
                                    </a>
                                </div>
                            @endif
                        </div>
                </div>
            @empty
                <div class="bg-yellow-50 text-yellow-700 p-6 rounded-xl border border-yellow-200 text-center font-medium">
                    Maaf, Admin belum menambahkan materi untuk modul ini.
                </div>
            @endforelse
        </div>

        <!-- TOMBOL KUIS -->
        @if($modul->materis->count() > 0)
        <div class="mt-12 mb-4 bg-purple-50 p-8 rounded-2xl border-2 border-dashed border-purple-300 text-center">
            <h3 class="text-2xl font-bold text-purple-900 mb-3">Sudah selesai membaca?</h3>
            <p class="text-purple-700 mb-6">Uji pemahamanmu dengan mengerjakan latihan soal untuk modul ini.</p>
            <a href="/belajar/{{ $modul->id }}/kuis" class="inline-flex items-center justify-center gap-3 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-black text-xl py-4 px-10 rounded-2xl hover:from-purple-700 hover:to-indigo-700 shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-1">
                Kerjakan Kuis Sekarang
            </a>
        </div>
        @endif
    </div>
@endsection