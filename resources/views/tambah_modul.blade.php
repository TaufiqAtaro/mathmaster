<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Modul - MathMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100 flex items-center justify-center min-h-screen">
    
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow-md border-t-4 border-green-500">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Modul Baru</h1>

        <!-- PERHATIKAN: enctype="multipart/form-data" wajib ada agar bisa kirim file -->
        <form action="/kelola-modul" method="POST" enctype="multipart/form-data">
                   @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Judul Modul</label>
                <input type="text" name="judul_modul" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Misal: Aljabar Linear" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tingkat Kelas</label>
                <input type="number" name="tingkat_kelas" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Misal: 7" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Modul</label>
                <textarea name="deskripsi" rows="4" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Jelaskan secara singkat isi modul ini..." required></textarea>
            </div>

            <!-- INI INPUT UNTUK GAMBARNYA -->
            <div class="mb-6 p-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg">
                <label class="block text-gray-700 text-sm font-bold mb-2">Gambar Cover (Opsional)</label>
                <input type="file" name="gambar_modul" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                <p class="text-xs text-gray-500 mt-2">Format: JPG, JPEG, PNG (Maksimal 2MB)</p>
            </div>

            <div class="flex justify-between items-center mt-8">
                <a href="/kelola-modul" class="text-gray-500 hover:text-gray-700 font-bold transition">Batal</a>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-green-700 shadow-md transition">Simpan Modul</button>
            </div>
        </form>
    </div>

</body>
</html>