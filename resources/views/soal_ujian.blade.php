<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <a href="/kelola-ujian" class="bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-xl font-bold text-sm shadow-sm transition">
                    ⬅️ Kembali ke Menu Ujian
                </a>
                <h2 class="font-black text-2xl text-gray-800 leading-tight">
                    Bank Soal Boss: <span class="text-pink-600">{{ $modul->judul_modul }}</span>
                </h2>
            </div>
            
            <a href="/ujian/tambah?modul_id={{ $modul->id }}" class="bg-pink-600 hover:bg-pink-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg transition text-sm">
                + Tambah Soal Ujian
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            @forelse($soals as $soal)
                <div class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-pink-500 flex flex-col gap-4">
                    
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex gap-4">
                            <span class="font-black text-gray-400 text-xl">Q{{ $loop->iteration }}</span>
                            <p class="font-bold text-gray-900 text-lg">{{ $soal->pertanyaan }}</p>
                        </div>
                        
                        <div class="flex items-center gap-2">
                            <a href="/ujian/{{ $soal->id }}/edit" class="text-yellow-600 hover:bg-yellow-100 p-2 rounded-lg transition" title="Edit Soal">✏️</a>
                            <form action="/ujian/{{ $soal->id }}" method="POST" onsubmit="return confirm('Hapus soal ujian ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus Soal">🗑️</button>
                            </form>
                        </div>
                    </div>

                    <div class="ml-10 grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'A' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600' }}">A. {{ $soal->opsi_a }}</div>
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'B' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600' }}">B. {{ $soal->opsi_b }}</div>
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'C' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600' }}">C. {{ $soal->opsi_c }}</div>
                        <div class="p-2 rounded-lg {{ $soal->jawaban_benar == 'D' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600' }}">D. {{ $soal->opsi_d }}</div>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-pink-300">
                    <p class="font-bold text-pink-500">Belum ada soal ujian untuk modul ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>