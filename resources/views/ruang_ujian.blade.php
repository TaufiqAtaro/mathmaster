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
                <div class="bg-white rounded-2xl shadow-sm border {{ $modul->skor_ujian !== null ? 'border-green-300' : 'border-indigo-300' }} p-6 flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
                    
                    @if($modul->skor_ujian !== null)
                        <!-- Label Sudah Dikerjakan -->
                        <div class="absolute top-0 right-0 bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">
                            Selesai
                        </div>
                    @endif

                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-indigo-100 text-indigo-700 w-10 h-10 rounded-lg flex items-center justify-center font-black text-lg">
                                🚀
                            </span>
                            <h3 class="text-xl font-bold text-gray-900">Ujian: {{ $modul->judul_modul }}</h3>
                        </div>
                        <p class="text-gray-500 text-sm mb-6">Kelas {{ $modul->tingkat_kelas }} • Akses ujian telah terbuka!</p>
                    </div>

                    <div class="flex items-center justify-between border-t border-gray-100 pt-4">
                        @if($modul->skor_ujian !== null)
                            <div>
                                <p class="text-xs text-gray-500 font-bold uppercase mb-1">Skor Terakhir</p>
                                <p class="text-2xl font-black {{ $modul->skor_ujian >= 70 ? 'text-green-500' : 'text-red-500' }}">{{ $modul->skor_ujian }}</p>
                            </div>
                            <a href="/modul/{{ $modul->id }}/ujian" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-bold py-2 px-5 rounded-lg transition text-sm">
                                Kerjakan Ulang
                            </a>
                        @else
                            <div>
                                <p class="text-xs text-green-600 font-bold bg-green-50 px-2 py-1 rounded border border-green-200">Menunggu Dikerjakan</p>
                            </div>
                            <a href="/modul/{{ $modul->id }}/ujian" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-5 rounded-lg transition text-sm shadow">
                                Mulai Ujian
                            </a>
                        @endif
                    </div>
                </div>
            @else
                <!-- KARTU UJIAN TERKUNCI -->
                <div class="bg-gray-50 rounded-2xl border border-gray-200 p-6 flex flex-col justify-between relative">
                    <div class="opacity-50 blur-[1px]">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="bg-gray-200 text-gray-500 w-10 h-10 rounded-lg flex items-center justify-center font-black text-lg">
                                🔒
                            </span>
                            <h3 class="text-xl font-bold text-gray-800">Ujian: {{ $modul->judul_modul }}</h3>
                        </div>
                        <p class="text-gray-500 text-sm mb-6">Kelas {{ $modul->tingkat_kelas }}</p>
                    </div>

                    <!-- Overlay Gembok -->
                    <div class="absolute inset-0 flex items-center justify-center z-10">
                        <div class="bg-white/90 backdrop-blur-sm px-4 py-2 rounded-lg border border-gray-200 text-center shadow-sm">
                            <span class="text-xl mb-1 block">🔒</span>
                            <p class="text-xs font-bold text-gray-600">Selesaikan Materi Dulu</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    @if($ujianList->count() == 0)
        <div class="text-center bg-gray-50 border border-gray-200 rounded-xl p-8 mt-6">
            <p class="text-gray-500 font-medium">Belum ada modul ujian yang tersedia saat ini.</p>
        </div>
    @endif
</div>
@endsection