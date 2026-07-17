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
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">🎯</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Fokus & Terarah</h3>
                <p class="text-gray-500">Materi disaring dan disusun khusus agar sesuai dengan kurikulum tanpa membuat otak kelebihan beban.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">🎮</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Belajar = Bermain</h3>
                <p class="text-gray-500">Sistem gembok materi dan Boss Fight membuat pengalaman belajar semenegangkan menyelesaikan game favoritmu.</p>
            </div>
            <div class="text-center p-6">
                <div class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center text-3xl mx-auto mb-4">📈</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">Pantau Progres</h3>
                <p class="text-gray-500">Siswa dan guru bisa melihat riwayat perkembangan nilai secara real-time dan transparan.</p>
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
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="w-24 h-24 bg-gradient-to-tr from-purple-500 to-indigo-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white font-black text-3xl shadow-inner">
                        A
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Ataro</h3>
                    <p class="text-purple-600 font-medium text-sm mb-3">Lead Developer</p>
                    <p class="text-gray-500 text-sm">Merancang arsitektur sistem inti dan logika e-learning.</p>
                </div>

                <!-- Anggota Tim 2 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="w-24 h-24 bg-gradient-to-tr from-blue-500 to-cyan-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white font-black text-3xl shadow-inner">
                        S
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Shomad</h3>
                    <p class="text-blue-600 font-medium text-sm mb-3">UI/UX & System Designer</p>
                    <p class="text-gray-500 text-sm">Memastikan antarmuka aplikasi mudah digunakan oleh siswa SMP.</p>
                </div>

                <!-- Anggota Tim 3 -->
                <div class="bg-white rounded-2xl p-6 text-center shadow-sm border border-gray-200 hover:shadow-md transition">
                    <div class="w-24 h-24 bg-gradient-to-tr from-pink-500 to-rose-500 rounded-full mx-auto mb-4 flex items-center justify-center text-white font-black text-3xl shadow-inner">
                        A
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Annisa</h3>
                    <p class="text-pink-600 font-medium text-sm mb-3">Content & Analyst</p>
                    <p class="text-gray-500 text-sm">Menganalisis kebutuhan sistem dan menyusun alur konten pendidikan.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection