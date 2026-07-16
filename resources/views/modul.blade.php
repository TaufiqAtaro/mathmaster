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
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition overflow-hidden border border-gray-100 flex flex-col relative">
                    
                    <!-- Area Gambar -->
                    @if($modul->gambar_modul)
                        <img src="{{ asset('storage/' . $modul->gambar_modul) }}" alt="Cover" class="w-full h-40 object-contain bg-gray-50 border-b border-gray-100">
                    @else
                        <div class="w-full h-40 bg-purple-100 flex items-center justify-center border-b border-purple-200">
                        </div>
                    @endif

                    <!-- Area Konten -->
                    <div class="p-5 flex-grow">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="font-black text-xl text-gray-800">{{ $modul->judul_modul }}</h2>
                            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-md shrink-0">
                                Kls {{ $modul->tingkat_kelas }}
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $modul->deskripsi }}</p>
                    </div>

                    <!-- Area Tombol Khusus Siswa -->
                    <div class="p-4 bg-purple-50 border-t border-purple-100 flex justify-center">
                        <a href="/belajar/{{ $modul->id }}" class="w-full text-center bg-purple-600 text-white font-bold text-sm hover:bg-purple-700 py-2.5 rounded-lg shadow-sm transition">
                            Mulai Belajar 
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection