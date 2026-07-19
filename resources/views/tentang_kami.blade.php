@extends('layouts.master')
@section('title', 'Tentang Kami - MathMaster')

@section('content')
<div class="bg-white">
    <!-- Header Section -->
    <div class="bg-purple-50 py-20 border-b border-purple-100">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-black text-gray-900 mb-6">Misi Kami: Membuat Matematika <span class="text-purple-600">Menyenangkan</span></h1>
            <p class="text-lg text-gray-600 leading-relaxed font-medium">
                MathMaster lahir dari keresahan melihat banyaknya siswa yang menyerah pada matematika sebelum mencoba. Kami percaya, dengan pendekatan yang tepat dan sistem belajar layaknya sebuah permainan, setiap siswa bisa menjadi juara kelas.
            </p>
        </div>
    </div>

    <!-- Core Values Section -->
    <div class="py-16 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 group">
                <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-blue-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Fokus & Terarah</h3>
                <p class="text-gray-500 leading-relaxed">Materi disaring dan disusun khusus agar sesuai dengan kurikulum tanpa membuat otak kelebihan beban.</p>
            </div>
            <div class="text-center p-6 group">
                <div class="w-16 h-16 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Belajar = Bermain</h3>
                <p class="text-gray-500 leading-relaxed">Sistem gembok materi dan Boss Fight membuat pengalaman belajar semenegangkan menyelesaikan game favoritmu.</p>
            </div>
            <div class="text-center p-6 group">
                <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">Pantau Progres</h3>
                <p class="text-gray-500 leading-relaxed">Siswa dan guru bisa melihat riwayat perkembangan nilai secara real-time dan transparan.</p>
            </div>
        </div>
    </div>

    <!-- Tim Pengembang Section -->
    <div class="bg-gray-50 py-20 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-black text-gray-900 mb-4">Tim Pengembang</h2>
                <p class="text-gray-500 text-lg">Orang-orang di balik layar berdirinya MathMaster.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <!-- Anggota Tim 1 -->
                <div class="bg-white rounded-3xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                    <div class="w-24 h-24 bg-gradient-to-tr from-purple-500 to-indigo-500 rounded-full mx-auto mb-5 flex items-center justify-center text-white font-black text-3xl shadow-inner group-hover:scale-105 transition-transform">
                        A
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Ataro</h3>
                    <p class="text-purple-600 font-bold text-sm mb-4">Lead Developer</p>
                    <p class="text-gray-500 text-sm leading-relaxed">Merancang arsitektur sistem inti dan logika e-learning.</p>
                </div>

                <!-- Anggota Tim 2 -->
                <div class="bg-white rounded-3xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                    <div class="w-24 h-24 bg-gradient-to-tr from-blue-500 to-cyan-500 rounded-full mx-auto mb-5 flex items-center justify-center text-white font-black text-3xl shadow-inner group-hover:scale-105 transition-transform">
                        S
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Shomad</h3>
                    <p class="text-blue-600 font-bold text-sm mb-4">UI/UX & System Designer</p>
                    <p class="text-gray-500 text-sm leading-relaxed">Memastikan antarmuka aplikasi mudah digunakan oleh siswa SMP.</p>
                </div>

                <!-- Anggota Tim 3 -->
                <div class="bg-white rounded-3xl p-8 text-center shadow-sm border border-gray-100 hover:shadow-md transition-shadow group">
                    <div class="w-24 h-24 bg-gradient-to-tr from-pink-500 to-rose-500 rounded-full mx-auto mb-5 flex items-center justify-center text-white font-black text-3xl shadow-inner group-hover:scale-105 transition-transform">
                        A
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Annisa</h3>
                    <p class="text-pink-600 font-bold text-sm mb-4">Content & Analyst</p>
                    <p class="text-gray-500 text-sm leading-relaxed">Menganalisis kebutuhan sistem dan menyusun alur konten pendidikan.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Hubungi Kami Section -->
    <div class="py-20 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-black text-gray-900 mb-4">Tetap Terhubung Dengan Kami</h2>
            <p class="text-gray-500 text-lg">Punya pertanyaan atau masukan? Jangan ragu untuk menyapa tim MathMaster melalui kanal berikut.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Kartu Instagram -->
            <!-- Tag <a> membungkus seluruh kartu agar logo dan teks bisa diklik -->
            <a href="https://instagram.com/mathmaster_id" target="_blank" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-pink-300 hover:shadow-md hover:bg-pink-50/30 transition-all duration-300 flex flex-col items-center text-center group block transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-pink-50 text-pink-500 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-pink-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zM17.5 6.5h.01"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Instagram</h3>
                <p class="text-pink-600 font-medium text-sm">@mathmaster_id</p>
            </a>

            <!-- Kartu WhatsApp -->
            <a href="https://wa.me/6281234567890" target="_blank" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-green-300 hover:shadow-md hover:bg-green-50/30 transition-all duration-300 flex flex-col items-center text-center group block transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-green-50 text-green-500 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-green-500 group-hover:text-white transition-colors">
                    <!-- SVG Authentic WhatsApp Logo -->
                    <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">WhatsApp</h3>
                <p class="text-green-600 font-medium text-sm">0812-3456-7890</p>
            </a>

            <!-- Kartu YouTube -->
            <a href="https://youtube.com/@mathmasterofficial" target="_blank" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-red-300 hover:shadow-md hover:bg-red-50/30 transition-all duration-300 flex flex-col items-center text-center group block transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-red-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M22.54 6.42a2.78 2.78 0 00-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 00-1.94 2A29 29 0 001 11.75a29 29 0 00.46 5.33A2.78 2.78 0 003.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 001.94-2 29 29 0 00.46-5.25 29 29 0 00-.46-5.33z"></path>
                        <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">YouTube</h3>
                <p class="text-red-600 font-medium text-sm">MathMaster Official</p>
            </a>

            <!-- Kartu Website -->
            <a href="https://mathmaster.com" target="_blank" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-blue-300 hover:shadow-md hover:bg-blue-50/30 transition-all duration-300 flex flex-col items-center text-center group block transform hover:-translate-y-1">
                <div class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mb-4 group-hover:bg-blue-500 group-hover:text-white transition-colors">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-1">Website</h3>
                <p class="text-blue-600 font-medium text-sm">www.mathmaster.com</p>
            </a>

        </div>
    </div>
</div>
@endsection