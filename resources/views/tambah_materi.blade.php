<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight">
            {{ __('✨ Tambah Materi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-2xl border-t-4 border-purple-500">
                <div class="p-8">
                    
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg">
                            <p class="font-bold mb-1">Duh, ada yang terlewat!</p>
                            <ul class="list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/materi" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Input ID Modul Tersembunyi -->
                        <input type="hidden" name="modul_id" value="{{ $modul_id }}">

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Judul Materi</label>
                            <input type="text" name="judul_materi" value="{{ old('judul_materi') }}" required class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-xl shadow-sm">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Isi Materi</label>
                            <textarea name="isi_materi" rows="6" class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-xl shadow-sm">{{ old('isi_materi') }}</textarea>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Link Video YouTube (Opsional)</label>
                            <input type="url" name="link_video" value="{{ old('link_video') }}" placeholder="Misal: https://www.youtube.com/watch?v=..." class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-xl shadow-sm">
                        </div>

                        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 border-dashed">
                            <label class="block text-gray-700 font-bold mb-2">File Lampiran (Opsional)</label>
                            <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200 transition">
                            <p class="text-xs text-gray-500 mt-2">Format: PDF, Word, atau Gambar (Maks 5MB)</p>
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 mt-6">
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-xl shadow-md transition">
                                Simpan Materi
                            </button>
                            <a href="/kelola-modul/{{ $modul_id }}/materi" class="text-gray-500 hover:text-gray-700 font-bold text-sm">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>