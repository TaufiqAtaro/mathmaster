<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Materi - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100 min-h-screen">
    
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md border-t-4 border-yellow-500">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Bab: {{ $materi->judul_materi }}</h1>
        
        <!-- Alarm Error Validasi -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-700 rounded border-l-4 border-red-500">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/materi/{{ $materi->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Pilih Modul Induk</label>
                <select name="modul_id" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
                    @foreach($data_modul as $modul)
                        <option value="{{ $modul->id }}" {{ $materi->modul_id == $modul->id ? 'selected' : '' }}>
                            {{ $modul->judul_modul }} (Kelas {{ $modul->tingkat_kelas }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul Materi</label>
                <input type="text" name="judul_materi" value="{{ $materi->judul_materi }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Isi Materi</label>
                <textarea name="isi_materi" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500" rows="5" required>{{ $materi->isi_materi }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Link Video YouTube</label>
                <input type="url" name="link_video" value="{{ $materi->link_video }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500">
            </div>

            <div class="mb-6 p-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg">
                <label class="block text-gray-700 font-bold mb-2">Ganti File Lampiran (Opsional)</label>
                @if($materi->file_lampiran)
                    <p class="text-sm text-blue-600 mb-2">File saat ini: <a href="{{ asset('storage/' . $materi->file_lampiran) }}" target="_blank" class="underline">Lihat File</a></p>
                @endif
                <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full text-sm text-gray-500 mb-2">
                <p class="text-xs text-gray-500">Biarkan kosong jika tidak ingin mengganti file.</p>
            </div>

            <div class="flex justify-between items-center mt-6">
                <a href="/kelola-modul" class="text-gray-500 hover:text-gray-700 font-bold transition">Batal</a>
                <button type="submit" class="bg-yellow-500 text-white font-bold px-6 py-2 rounded hover:bg-yellow-600 shadow-md">
                    Update Materi
                </button>
            </div>
        </form>
    </div>

</body>
</html>