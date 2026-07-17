@extends('layouts.master')

@section('title', 'MathMaster - Jago Matematika Itu Mudah!')

{{-- Mendorong animasi CSS ke dalam Master Layout --}}
@push('styles')
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-15px); }
        100% { transform: translateY(0px); }
    }
    .animate-float {
        animation: float 4s ease-in-out infinite;
    }
@endpush

@section('content')
    <!-- Hero Section (Desain Asli Ataro) -->
    <div class="pt-12 pb-16 flex items-center relative overflow-hidden bg-gradient-to-b from-white to-gray-50">
        <!-- Dekorasi Background -->
        <div class="absolute top-10 left-10 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute top-20 right-20 w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <!-- Teks Hero -->
                <div class="text-center md:text-left space-y-6 md:pr-10">
                    <div class="inline-block px-4 py-1.5 rounded-full bg-purple-100 text-purple-700 font-bold text-sm mb-2 shadow-sm border border-purple-200">
                        🚀 E-Learning Matematika Interaktif
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight text-gray-900">
                        Taklukkan Matematika <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500">
                            Satu Per Satu!
                        </span>
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed md:max-w-lg font-medium">
                        Tinggalkan cara lama yang membosankan. Tuntaskan materi, buka gembok level berikutnya, dan buktikan kemampuanmu di Ujian Akhir Modul!
                    </p>
                    
                    <div class="pt-4 flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        @auth
                            <a href="/modul" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3.5 rounded-full font-bold text-lg shadow-lg hover:shadow-purple-500/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                Buka Ruang Kelas
                            </a>
                            <a href="/ruang-ujian" class="bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-8 py-3.5 rounded-full font-bold text-lg shadow-sm transition flex items-center justify-center">
                                Ruang Ujian
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3.5 rounded-full font-bold text-lg shadow-lg hover:shadow-purple-500/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                Daftar Gratis Sekarang
                            </a>
                            <a href="{{ route('login') }}" class="bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-8 py-3.5 rounded-full font-bold text-lg shadow-sm transition flex items-center justify-center">
                                Masuk
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Ilustrasi Hero -->
                <div class="relative hidden md:flex justify-center items-center">
                    <div class="bg-white p-6 rounded-2xl shadow-2xl border border-purple-100 relative z-10 animate-float w-full max-w-sm">
                        <div class="flex justify-between items-center mb-4 border-b pb-4">
                            <span class="font-bold text-gray-700">Pencapaian Kuis</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-black">A+ Sempurna</span>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-2xl">📐</div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm">Geometri Dasar</h4>
                                    <div class="w-32 h-2 bg-gray-200 rounded-full mt-1">
                                        <div class="w-full h-2 bg-green-500 rounded-full"></div>
                                    </div>
                                </div>
                                <span class="ml-auto font-bold text-green-600 text-sm">100</span>
                            </div>
                            <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-2xl">🔒</div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm">Aljabar Lanjut</h4>
                                    <div class="w-32 h-2 bg-gray-200 rounded-full mt-1">
                                        <div class="w-1/4 h-2 bg-yellow-500 rounded-full"></div>
                                    </div>
                                </div>
                                <span class="ml-auto font-bold text-gray-400 text-xs">Terkunci</span>
                            </div>
                        </div>
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center text-4xl shadow-lg border-4 border-white animate-bounce" style="animation-duration: 3s;">
                            🏆
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Fitur Section (Pembaruan: Fokus ke Gembok & Boss Fight) -->
    <section id="fitur" class="bg-white py-20 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl font-black text-gray-900 mb-4">Kenapa Belajar di MathMaster?</h2>
                <p class="text-gray-500 font-medium text-lg">Kami mendesain pengalaman belajar layaknya menyelesaikan sebuah misi, agar kamu tidak mudah bosan.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fitur 1 -->
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 hover:border-purple-300 group">
                    <div class="w-16 h-16 bg-purple-50 group-hover:bg-purple-600 rounded-2xl flex items-center justify-center text-3xl mb-6 transition duration-300">
                        <span class="group-hover:scale-110 transition">📚</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Materi Terstruktur</h3>
                    <p class="text-gray-600 leading-relaxed">Materi disusun rapi per tingkat kelas. Dilengkapi dengan rangkuman teori, contoh soal, dan pembahasan interaktif.</p>
                </div>
                <!-- Fitur 2 -->
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 hover:border-blue-300 transform md:-translate-y-4 group">
                    <div class="w-16 h-16 bg-blue-50 group-hover:bg-blue-600 rounded-2xl flex items-center justify-center text-3xl mb-6 transition duration-300">
                        <span class="group-hover:scale-110 transition">🔒</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Sistem Gembok Otomatis</h3>
                    <p class="text-gray-600 leading-relaxed">Tidak bisa lompat materi sembarangan! Kamu wajib lulus kuis minimal skor 70 untuk membuka materi selanjutnya.</p>
                </div>
                <!-- Fitur 3 -->
                <div class="bg-white rounded-2xl p-8 shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 hover:border-pink-300 group">
                    <div class="w-16 h-16 bg-pink-50 group-hover:bg-pink-500 rounded-2xl flex items-center justify-center text-3xl mb-6 transition duration-300">
                        <span class="group-hover:scale-110 transition">⚔️</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Boss Fight Ujian Akhir</h3>
                    <p class="text-gray-600 leading-relaxed">Buktikan semua pemahamanmu di Ujian Akhir Modul. Nilaimu akan terekam secara otomatis di rekap guru.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Etalase Modul Section (Desain Asli Ataro) -->
    <section class="bg-gray-50 py-20 border-t border-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-12">
                <div class="max-w-2xl">
                    <h2 class="text-3xl font-black text-gray-900 mb-4">Intip Modul Pembelajaran</h2>
                    <p class="text-gray-600 text-lg">Beberapa materi pilihan yang siap menemanimu menaklukkan rumus-rumus tersulit.</p>
                </div>
                <div class="hidden md:block">
                    <a href="/login" class="text-purple-600 font-bold hover:text-purple-800 transition">Lihat Semua Modul &rarr;</a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @isset($data_modul)
                    @forelse($data_modul as $modul)
                        <div class="bg-white rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden border border-gray-100 flex flex-col">
                            @if($modul->gambar_modul)
                                <img src="{{ asset('storage/' . $modul->gambar_modul) }}" alt="Cover" class="w-full h-48 object-contain bg-gray-50 border-b border-gray-100 p-2">
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center text-5xl">
                                    📘
                                </div>
                            @endif
                            <div class="p-6 flex-grow">
                                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-md mb-3 inline-block">
                                    Kelas {{ $modul->tingkat_kelas }}
                                </span>
                                <h3 class="font-black text-xl text-gray-800 mb-2">{{ $modul->judul_modul }}</h3>
                                <p class="text-gray-500 text-sm line-clamp-2">{{ $modul->deskripsi }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-10 bg-white rounded-2xl border border-dashed border-gray-300">
                            <p class="text-gray-500 font-medium">Modul pembelajaran sedang disiapkan oleh Admin.</p>
                        </div>
                    @endforelse
                @endisset
            </div>
            
            <div class="mt-8 text-center md:hidden">
                <a href="/login" class="text-purple-600 font-bold hover:text-purple-800 transition">Lihat Semua Modul &rarr;</a>
            </div>
        </div>
    </section>

    <!-- Call To Action (CTA) Section -->
    <section class="bg-gradient-to-r from-purple-700 to-blue-600 py-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-6">Jangan Tunggu Sampai Ujian Tiba!</h2>
            <p class="text-purple-100 text-lg mb-8 max-w-2xl mx-auto">
                Bergabunglah sekarang, akses seluruh materi, kerjakan kuisnya, dan buktikan bahwa matematika itu gampang banget.
            </p>
            @auth
                <a href="/modul" class="bg-white text-purple-700 px-10 py-4 rounded-full font-black text-lg shadow-xl hover:bg-gray-50 transition transform hover:scale-105 inline-block">
                    Lanjutkan Belajarmu
                </a>
            @else
                <a href="{{ route('register') }}" class="bg-yellow-400 text-yellow-900 px-10 py-4 rounded-full font-black text-lg shadow-xl hover:bg-yellow-300 transition transform hover:scale-105 inline-block">
                    Daftar Sekarang - Gratis!
                </a>
            @endauth
        </div>
    </section>
@endsection