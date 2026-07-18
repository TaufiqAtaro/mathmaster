<x-app-layout>
<x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <a href="/kelola-modul/{{ $materi->modul_id }}/materi" class="bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-xl font-bold text-sm shadow-sm transition">
                    ⬅️ Kembali ke Materi
                </a>
                <h2 class="font-black text-2xl text-gray-800 leading-tight">
                    Soal Kuis: <span class="text-blue-600">{{ $materi->judul_materi }}</span>
                </h2>
            </div>
            
            <!-- INI BAGIAN TOMBOL TAMBAH SOALNYA -->
            <a href="/soal/tambah?materi_id={{ $materi->id }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg transition text-sm">
                + Tambah Soal Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            @forelse($soals as $soal)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
                    
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex gap-4">
                            <span class="font-black text-gray-400 text-xl">Q{{ $loop->iteration }}</span>
                            <p class="font-bold text-gray-900 text-lg">{{ $soal->pertanyaan }}</p>
                        </div>
                        
                        <!-- Aksi Edit & Hapus Soal -->
                        <div class="flex items-center gap-2">
                            <a href="/soal/{{ $soal->id }}/edit" class="text-yellow-600 hover:bg-yellow-100 p-2 rounded-lg transition" title="Edit Soal">✏️</a>
                            <form action="/soal/{{ $soal->id }}" method="POST" onsubmit="return confirm('Hapus soal ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus Soal">🗑️</button>
                            </form>
                        </div>
                    </div>

                    <!-- Tampilan Opsi Jawaban (Hijau = Jawaban Benar) -->
                    <div class="ml-10 grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'A' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            A. {{ $soal->opsi_a }} {!! $soal->jawaban_benar == 'A' ? '✅' : '' !!}
                        </div>
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'B' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            B. {{ $soal->opsi_b }} {!! $soal->jawaban_benar == 'B' ? '✅' : '' !!}
                        </div>
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'C' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            C. {{ $soal->opsi_c }} {!! $soal->jawaban_benar == 'C' ? '✅' : '' !!}
                        </div>
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'D' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            D. {{ $soal->opsi_d }} {!! $soal->jawaban_benar == 'D' ? '✅' : '' !!}
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                    <p class="font-bold text-gray-500">Belum ada soal untuk materi ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>