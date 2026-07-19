<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
            <!-- Ikon Home -->
            <svg class="w-7 h-7 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            {{ __('Selamat Datang, Admin!') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Grid Shortcut Menu -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Shortcut Kelola Modul -->
                <a href="/kelola-modul" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-purple-300 hover:shadow-md transition group block">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-1">Kelola Modul</h3>
                    <p class="text-sm text-gray-500">Tambah, edit, atau hapus modul, materi, dan soal kuis.</p>
                </a>

                <!-- Shortcut Kelola Ujian -->
                <a href="/kelola-ujian" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-pink-300 hover:shadow-md transition group block">
                    <div class="w-14 h-14 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-1">Kelola Ujian</h3>
                    <p class="text-sm text-gray-500">Atur bank soal untuk bos terakhir (Ujian Akhir Modul).</p>
                </a>

                <!-- Shortcut Rekap Nilai -->
                <a href="/rekap-nilai" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-blue-300 hover:shadow-md transition group block">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                        <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-1">Rekap Nilai</h3>
                    <p class="text-sm text-gray-500">Pantau perkembangan, kelulusan, dan nilai para siswa.</p>
                </a>
            </div>

            <!-- Info Box Bawah -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row items-center p-8 gap-8">
                <div class="w-32 h-32 bg-indigo-50 text-indigo-500 rounded-full flex items-center justify-center shadow-inner flex-shrink-0 border-4 border-white">
                    <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
                <div>
                    <h3 class="font-black text-2xl text-gray-900 mb-2">Control Panel Aktif</h3>
                    <p class="text-gray-600 leading-relaxed max-w-2xl font-medium">
                        Semua fitur manajemen e-learning MathMaster sudah terhubung dan berjalan dengan baik. Gunakan menu navigasi di atas atau kartu jalan pintas di samping untuk mulai mengatur sistem belajar.
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>