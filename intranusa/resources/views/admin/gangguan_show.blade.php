<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Laporan Gangguan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans py-8">
  <div class="max-w-3xl mx-auto px-4">

    <!-- Title -->
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Detail Laporan Gangguan</h1>

    <!-- Card for gangguan details -->
    <div class="bg-white rounded-lg shadow-lg">
      <div class="bg-blue-600 text-white p-4 rounded-t-lg">
        <h2 class="text-xl font-semibold">Laporan Gangguan #{{ $gangguan->id }}</h2>
      </div>
      <div class="p-6 space-y-4">
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Nama:</span>
          <span class="text-gray-600">{{ $gangguan->nama }}</span>
        </div>
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Hari:</span>
          <span class="text-gray-600">{{ $gangguan->hari }}</span>
        </div>
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Tanggal:</span>
          <span class="text-gray-600">{{ $gangguan->tanggal }}</span>
        </div>
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Alamat:</span>
          <span class="text-gray-600">{{ $gangguan->alamat }}</span>
        </div>
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Jenis Gangguan:</span>
          <span class="text-gray-600">{{ $gangguan->jenis }}</span>
        </div>
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Keterangan:</span>
          <span class="text-gray-600">{{ $gangguan->keterangan }}</span>
        </div>
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Penyebab:</span>
          <span class="text-gray-600">{{ $gangguan->penyebab }}</span>
        </div>
        <div class="flex justify-between">
          <span class="font-semibold text-gray-700">Status:</span>
          <span class="text-gray-600">{{ $gangguan->status }}</span>
        </div>
      </div>
    </div>

    <!-- Update Status Section -->
    <div class="mt-8">
      <h3 class="text-2xl font-semibold text-gray-800 mb-4">Update Status Laporan</h3>
      <form action="{{ route('gangguan.updateStatus', $gangguan->id) }}" method="POST" class="space-y-4">
        @csrf
        <div>
          <label for="status" class="block text-gray-700 font-medium">Pilih Status</label>
          <select name="status" id="status" class="w-full border border-gray-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-400">
            <option value="menunggu" {{ $gangguan->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
            <option value="diproses" {{ $gangguan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
            <option value="selesai" {{ $gangguan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
          </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">Update Status</button>
      </form>
    </div>

    <!-- Back Button -->
    <div class="mt-4 text-center">
      <a href="{{ route('gangguan.index') }}" class="inline-block bg-gray-300 text-gray-800 py-2 px-4 rounded-lg hover:bg-gray-400 transition">Kembali ke Daftar Laporan</a>
    </div>

  </div>
</body>
</html>
