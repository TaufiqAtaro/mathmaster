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
        
        <form action="/materi/simpan" method="POST">
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

            <button type="submit" class="bg-purple-600 text-white font-bold px-4 py-2 rounded hover:bg-purple-700 w-full">
                Simpan Materi
            </button>
        </form>
    </div>

</body>
</html>