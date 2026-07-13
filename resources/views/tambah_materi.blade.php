<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Materi - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md border-t-4 border-purple-500">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Materi (Bab) Baru</h1>
        
        <form action="/materi" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Pilih Modul Induk</label>
                <select name="modul_id" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" required>
                    <option value="">-- Pilih Modul --</option>
                    @foreach($data_modul as $modul)
                        <option value="{{ $modul->id }}">{{ $modul->judul_modul }} (Kelas {{ $modul->tingkat_kelas }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul Materi</label>
                <input type="text" name="judul_materi" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Isi Materi Pendek</label>
                <textarea name="isi_materi" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" rows="5"></textarea>
            </div>

            <!-- Input Link Video -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Link Video YouTube (Opsional)</label>
                <input type="url" name="link_video" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Misal: https://www.youtube.com/watch?v=xxxxxxx">
            </div>

            <!-- Input File Lampiran -->
            <div class="mb-6 p-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg">
                <label class="block text-gray-700 text-sm font-bold mb-2">File Lampiran (Opsional)</label>
                <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                <p class="text-xs text-gray-500 mt-2">Format: PDF, Word, atau Gambar (Maksimal 5MB)</p>
            </div>

            <button type="submit" class="bg-purple-600 text-white font-bold px-4 py-2 rounded hover:bg-purple-700 w-full">
                Simpan Materi
            </button>
        </form>
    </div>

</body>
</html>