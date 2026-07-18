<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight">
            {{ __('✏️ Edit Materi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border-t-4 border-yellow-500">
                <div class="p-8">
                    
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg">
                            <p class="font-bold mb-1">Periksa kembali data Anda:</p>
                            <ul class="list-disc list-inside text-sm mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/materi/{{ $materi->id }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Judul Materi</label>
                            <input type="text" name="judul_materi" value="{{ old('judul_materi', $materi->judul_materi) }}" required class="w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-xl shadow-sm">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Isi Materi</label>
                            <textarea name="isi_materi" rows="6" class="w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-xl shadow-sm">{{ old('isi_materi', $materi->isi_materi) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Link Video YouTube (Opsional)</label>
                            <input type="url" name="link_video" value="{{ old('link_video', $materi->link_video) }}" class="w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-xl shadow-sm">
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 border-dashed">
                            <label class="block text-gray-700 font-bold mb-2">Ganti File Lampiran (Opsional)</label>
                            
                            @if($materi->file_lampiran)
                                <div class="mb-4 p-3 bg-blue-50 text-blue-700 rounded-lg inline-block border border-blue-100">
                                    <span class="text-sm">File saat ini:</span>
                                    <a href="{{ asset('storage/' . $materi->file_lampiran) }}" target="_blank" class="font-bold underline ml-2">Lihat File</a>
                                </div>
                            @endif
                            
                            <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 transition mt-2">
                            <p class="text-xs text-gray-500 mt-2">Biarkan kosong jika tidak ingin mengganti file.</p>
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 mt-6">
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-xl shadow-md transition">
                                Update Materi
                            </button>
                            <!-- Tombol kembali yang dinamis -->
                            <a href="/kelola-modul/{{ $materi->modul_id }}/materi" class="text-gray-500 hover:text-gray-700 font-bold text-sm">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>