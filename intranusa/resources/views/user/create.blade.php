<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Lapor Gangguan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
  <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-xl font-bold mb-4 flex items-center gap-2 text-yellow-600">
      ⚠️ Lapor Gangguan
    </h2>

    @if(session('success'))
      <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
      </div>
    @endif

    <form action="{{ route('gangguan.store') }}" method="POST" class="space-y-4">
      @csrf

      <div>
        <label class="block font-medium text-sm mb-1">Hari</label>
        <select name="hari" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-400">
          <option value="">-- Pilih Hari --</option>
          @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $day)
            <option>{{ $day }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block font-medium text-sm mb-1">Tanggal</label>
        <input type="date" name="tanggal" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-400" required />
      </div>

      <div>
        <label class="block font-medium text-sm mb-1">Nama</label>
        <input type="text" name="nama" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-400" required />
      </div>

      <div>
        <label class="block font-medium text-sm mb-1">Alamat</label>
        <input type="text" name="alamat" placeholder="Contoh: Jl. Merpati No. 10" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-400" required />
      </div>

      <div>
        <label class="block font-medium text-sm mb-1">Jenis Gangguan</label>
        <select name="jenis" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-400">
          <option value="">-- Pilih Jenis --</option>
          <option>Tidak ada koneksi</option>
          <option>Koneksi lambat</option>
          <option>Kabel longgar</option>
          <option>Lainnya</option>
        </select>
      </div>

      <div>
        <label class="block font-medium text-sm mb-1">Keterangan (Opsional)</label>
        <textarea name="keterangan" rows="3" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-400"></textarea>
      </div>

      <div>
        <label class="block font-medium text-sm mb-1">Penyebab Gangguan (jika tahu)</label>
        <input type="text" name="penyebab" placeholder="Misal: kabel putus" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-400" />
      </div>

      <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
        Kirim Laporan
      </button>
    </form>
  </div>
</body>
</html>
