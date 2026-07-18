<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight">
            {{ __('👋 Selamat Datang, Admin!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Grid Shortcut Menu -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- Shortcut Kelola Modul -->
                <a href="/kelola-modul" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-purple-300 hover:shadow-md transition group block">
                    <div class="w-14 h-14 bg-purple-50 text-purple-600 rounded-2xl flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                        📚
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-1">Kelola Modul</h3>
                    <p class="text-sm text-gray-500">Tambah, edit, atau hapus modul, materi, dan soal kuis.</p>
                </a>

                <!-- Shortcut Kelola Ujian -->
                <a href="/kelola-ujian" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-pink-300 hover:shadow-md transition group block">
                    <div class="w-14 h-14 bg-pink-50 text-pink-600 rounded-2xl flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                        ⚔️
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-1">Kelola Ujian</h3>
                    <p class="text-sm text-gray-500">Atur bank soal untuk bos terakhir (Ujian Akhir Modul).</p>
                </a>

                <!-- Shortcut Rekap Nilai -->
                <a href="/rekap-nilai" class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 hover:border-blue-300 hover:shadow-md transition group block">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-4 group-hover:scale-110 transition">
                        📊
                    </div>
                    <h3 class="font-bold text-xl text-gray-900 mb-1">Rekap Nilai</h3>
                    <p class="text-sm text-gray-500">Pantau perkembangan, kelulusan, dan nilai para siswa.</p>
                </a>
            </div>

            <!-- Info Box Bawah -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row items-center p-8 gap-8">
                <div class="w-32 h-32 bg-gray-50 rounded-full flex items-center justify-center text-6xl shadow-inner flex-shrink-0 border-4 border-white">
                    🚀
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