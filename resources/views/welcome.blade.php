<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MathMaster - Jago Matematika Itu Mudah!</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi mengambang kustom */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md fixed w-full z-50 border-b border-gray-100 transition-all duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <span class="font-black text-2xl text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500 tracking-tight">
                        MathMaster
                    </span>
                </div>

                <!-- Navigasi Kanan (Auth) -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="/dashboard" class="text-sm font-semibold text-gray-600 hover:text-purple-600 transition">Dashboard Admin</a>
                        @else
                            <a href="/modul" class="text-sm font-semibold text-gray-600 hover:text-purple-600 transition">Ruang Belajar</a>
                        @endif
                        
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="bg-red-100 text-red-600 hover:bg-red-200 px-4 py-2 rounded-full font-bold text-sm transition">
                                Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-purple-600 transition">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-full font-bold text-sm shadow-md hover:shadow-lg transition transform hover:-translate-y-0.5">
                                Daftar Gratis
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="flex-grow pt-24 pb-12 flex items-center relative overflow-hidden">
        <!-- Dekorasi Background -->
        <div class="absolute top-20 left-10 w-64 h-64 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute top-40 right-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse" style="animation-delay: 2s;"></div>

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                
                <!-- Teks Hero -->
                <div class="text-center md:text-left space-y-6 md:pr-10">
                    <div class="inline-block px-4 py-1.5 rounded-full bg-purple-100 text-purple-700 font-bold text-sm mb-2 shadow-sm border border-purple-200">
                        Sahabat Belajar Siswa SMP
                    </div>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black leading-tight text-gray-900">
                        Pusing Matematika? <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500">
                            Mari Buat Jadi Seru!
                        </span>
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed md:max-w-lg">
                        Tinggalkan cara lama yang membosankan. Di MathMaster, kamu akan belajar lewat modul interaktif yang mudah dipahami dan bikin ketagihan. Siap dapat nilai 100?
                    </p>
                    
                    <div class="pt-4 flex flex-col sm:flex-row gap-4 justify-center md:justify-start">
                        @auth
                            <a href="/modul" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3.5 rounded-full font-bold text-lg shadow-lg hover:shadow-purple-500/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                Lanjut Belajar
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3.5 rounded-full font-bold text-lg shadow-lg hover:shadow-purple-500/30 transition transform hover:-translate-y-1 flex items-center justify-center gap-2">
                                Mulai Sekarang
                            </a>
                        @endauth
                        <a href="#fitur" class="bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 px-8 py-3.5 rounded-full font-bold text-lg shadow-sm transition flex items-center justify-center">
                            Lihat Fitur
                        </a>
                    </div>
                </div>

                <!-- Ilustrasi Hero -->
                <div class="relative hidden md:flex justify-center items-center">
                    <!-- Kartu Mengambang -->
                    <div class="bg-white p-6 rounded-2xl shadow-xl border border-purple-100 relative z-10 animate-float w-full max-w-sm">
                        <div class="flex justify-between items-center mb-4 border-b pb-4">
                            <span class="font-bold text-gray-700">Skor Kamu</span>
                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-black">A+ Sempurna</span>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-2xl">📐</div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm">Geometri Dasar</h4>
                                    <p class="text-xs text-gray-500">Selesai 100%</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center text-2xl">📊</div>
                                <div>
                                    <h4 class="font-bold text-gray-800 text-sm">Aljabar</h4>
                                    <p class="text-xs text-gray-500">Selesai 100%</p>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -right-6 -bottom-6 w-20 h-20 bg-yellow-400 rounded-full flex items-center justify-center text-4xl shadow-lg border-4 border-white animate-bounce" style="animation-duration: 3s;">
                            🏆
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Fitur Section -->
    <section id="fitur" class="bg-white py-20 border-t border-gray-100">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl font-black text-gray-900 mb-4">Kenapa Belajar di MathMaster?</h2>
                <p class="text-gray-600 text-lg">Kami mendesain pengalaman belajar yang tidak akan kamu temukan di buku catatan biasa.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Fitur 1 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:bg-purple-50 transition duration-300 border border-gray-100 hover:border-purple-200">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl mb-6">🎯</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Tepat Sasaran</h3>
                    <p class="text-gray-600">Materi disusun rapi khusus untuk kurikulum anak SMP. Fokus ke inti tanpa basa-basi.</p>
                </div>
                <!-- Fitur 2 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:bg-blue-50 transition duration-300 border border-gray-100 hover:border-blue-200 transform md:-translate-y-4">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl mb-6">🎮</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Anti Bosan</h3>
                    <p class="text-gray-600">Dilengkapi visual yang menarik dan contoh kasus nyata sehari-hari biar lebih gampang membayangkan rumus.</p>
                </div>
                <!-- Fitur 3 -->
                <div class="bg-gray-50 rounded-2xl p-8 hover:bg-pink-50 transition duration-300 border border-gray-100 hover:border-pink-200">
                    <div class="w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-3xl mb-6">⚡</div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Akses 24/7</h3>
                    <p class="text-gray-600">Mau belajar malam hari atau pas mau ujian besok pagi? Akses semua modul kapan saja dan di mana saja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-8 text-center border-t border-gray-800 mt-auto">
        <p>&copy; 2026 MathMaster. Dibuat dengan 💜 untuk Pelajar SMP.</p>
    </footer>

</body>
</html>