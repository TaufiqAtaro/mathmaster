<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Modul</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md border-t-4 border-yellow-500">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Modul</h1>
        
        <form action="/kelola-modul/{{ $modul_edit->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Judul Modul</label>
                <!-- value="{...}" ini fungsinya menampilkan data lama di dalam kotak input -->
                <input type="text" name="judul_modul" value="{{ $modul_edit->judul_modul }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Tingkat Kelas</label>
                <input type="number" name="tingkat_kelas" value="{{ $modul_edit->tingkat_kelas }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500" required>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Deskripsi Singkat</label>
                <!-- Textarea menampilkan value di antara tag pembuka dan penutup -->
                <textarea name="deskripsi" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500" rows="4">{{ $modul_edit->deskripsi }}</textarea>
            </div>

            <div class="mb-6 p-4 bg-gray-50 border border-dashed border-gray-300 rounded-lg">
                <label class="block text-gray-700 text-sm font-bold mb-2">Ganti Gambar Cover (Kosongkan jika tidak diganti)</label>
                <input type="file" name="gambar_modul" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-50 file:text-yellow-700 hover:file:bg-yellow-100">
            </div>

            <button type="submit" class="bg-yellow-500 text-white font-bold px-4 py-2 rounded hover:bg-yellow-600 w-full">
                Update Data Modul
            </button>
        </form>
    </div>

</body>
</html>