<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Modul MathMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md border-t-4 border-green-500">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Modul Baru</h1>
        
        <form action="/modul/simpan" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul Modul</label>
                <input type="text" name="judul_modul" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Tingkat Kelas (7, 8, atau 9)</label>
                <input type="number" name="tingkat_kelas" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Deskripsi Singkat</label>
                <textarea name="deskripsi" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-green-500" rows="4"></textarea>
            </div>

            <button type="submit" class="bg-green-600 text-white font-bold px-4 py-2 rounded hover:bg-green-700 w-full">
                Simpan Modul
            </button>
        </form>
    </div>

</body>
</html>