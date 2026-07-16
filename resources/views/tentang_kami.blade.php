@extends('layouts.master')

@section('title', 'Tentang Kami - MathMaster')

@section('content')
    <div class="bg-white">
        <div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 sm:py-24 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-purple-600 tracking-wide uppercase">Misi Kami</h2>
                <p class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">MathMaster</p>
                <p class="max-w-xl mt-5 mx-auto text-xl text-gray-500">Platform pembelajaran matematika modern yang dirancang khusus untuk membantu siswa SMP memahami konsep angka dengan cara yang menyenangkan dan interaktif.</p>
            </div>
        </div>
    </div>

    <div class="bg-gray-50 py-16">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
                <!-- Area Gambar/Ilustrasi -->
                <div class="md:w-2/5 bg-purple-600 flex items-center justify-center p-12 text-center text-white">
                    <div>
                        <div class="text-7xl mb-6">💡</div>
                        <h3 class="text-2xl font-bold mb-2">Dibuat oleh Ataro</h3>
                        <p class="text-purple-200">Dikembangkan penuh cinta untuk kemajuan pendidikan digital.</p>
                    </div>
                </div>
                
                <!-- Area Teks -->
                <div class="md:w-3/5 p-8 md:p-12">
                    <h3 class="text-2xl font-black text-gray-900 mb-6">Mengapa Aplikasi Ini Lahir?</h3>
                    
                    <div class="space-y-6 text-gray-600 leading-relaxed">
                        <p>Banyak siswa menganggap matematika sebagai pelajaran yang menyeramkan. Rumus yang rumit, buku cetak yang tebal, dan metode belajar yang monoton seringkali mematikan semangat belajar mereka sebelum mencoba.</p>
                        
                        <p><strong>MathMaster</strong> hadir untuk mendobrak stigma tersebut. Kami percaya bahwa setiap anak bisa jago matematika jika diberikan modul yang tepat sasaran, visual yang menarik, dan kuis yang menguji pemahaman mereka secara instan.</p>
                        
                        <div class="bg-purple-50 p-6 rounded-xl border border-purple-100 mt-6">
                            <h4 class="font-bold text-purple-900 mb-2">Hubungi Pengembang</h4>
                            <p class="text-purple-700 text-sm">Jika kamu memiliki pertanyaan, saran modul baru, atau menemukan masalah pada aplikasi, jangan ragu untuk menghubungi tim admin kami melalui email: <span class="font-bold">halo@mathmaster.id</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection