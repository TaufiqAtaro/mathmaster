@extends('layouts.master')

@section('title', 'Ruang Belajar - MathMaster')

@section('content')
    <!-- Hero Section -->
    <header class="container mx-auto text-center py-20 px-4">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-5">Belajar Matematika Jadi Lebih Menyenangkan!</h1>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Jelajahi berbagai modul interaktif yang disiapkan khusus untuk membantu siswa SMP memahami konsep-konsep matematika dengan mudah dan menyenangkan.</p>
    </header>

    <!-- Area Daftar Modul -->
    <div class="container mx-auto px-4 pb-20">
        <!-- Grid Modul Siswa -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($moduls as $modul)
            <div class="bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 flex flex-col relative group overflow-hidden">
                
                <!-- Link Raksasa (Z-index tinggi memastikan klik selalu mengenai link ini) -->
                <a href="/belajar/{{ $modul->id }}" class="absolute inset-0 z-20" title="Buka Modul"></a>

                <!-- Area Gambar 2:1 -->
                <div class="w-full aspect-[2/1] relative overflow-hidden bg-gray-100">
                    @if($modul->gambar_modul)
                        <img src="{{ asset('storage/' . $modul->gambar_modul) }}" alt="Cover" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <img src="https://placehold.co/800x400/f3f4f6/a8a29e?text=Modul+Belajar" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Placeholder">
                    @endif
                    <div class="absolute top-3 right-3 bg-white/90 backdrop-blur text-purple-700 font-bold px-3 py-1 rounded-lg text-xs shadow-sm z-10">
                        Kelas {{ $modul->tingkat_kelas }}
                    </div>
                </div>

                <!-- Area Konten (Pointer events none agar klik tembus ke link) -->
                <div class="p-6 flex-grow pointer-events-none">
                    <h2 class="font-black text-xl text-gray-800 mb-2 group-hover:text-purple-600 transition-colors">{{ $modul->judul_modul }}</h2>
                    <p class="text-gray-500 text-sm line-clamp-2">{{ $modul->deskripsi }}</p>
                </div>

                <!-- Area Tombol (Pointer events none agar klik tembus ke link) -->
                <div class="p-4 bg-purple-50/50 border-t border-purple-50 flex justify-between items-center pointer-events-none group-hover:bg-purple-100 transition-colors">
                    <span class="font-bold text-purple-600 text-sm">Mulai Belajar</span>
                    <svg class="w-5 h-5 text-purple-500 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
            </div>
        @endforeach
    </div>
@endsection