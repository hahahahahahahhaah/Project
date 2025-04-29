<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Daftar Gangguan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans py-8">
  <div class="max-w-4xl mx-auto px-4">
    <h2 class="text-2xl font-bold text-center mb-8">Daftar Gangguan</h2>

    @foreach ($gangguans as $gangguan)
      <div class="bg-white rounded-lg shadow-md p-6 mb-6 space-y-3">
        <div>
            <p class="text-sm text-gray-500">Hari</p>
            <p class="text-lg font-semibold text-blue-600">{{ $gangguan->hari }}</p>
          </div>

          <div>
            <p class="text-sm text-gray-500">Nama</p>
            <p class="text-lg font-medium text-gray-800">{{ $gangguan->nama }}</p>
          </div>

          <!-- Jenis Gangguan -->
          <div>
            <p class="text-sm text-gray-500">Jenis Gangguan</p>
            <p class="text-lg font-semibold text-blue-600">{{ $gangguan->jenis }}</p>
          </div>

          <!-- Keterangan -->
          <div>
            <p class="text-sm text-gray-500">Keterangan</p>
            <p class="text-base text-gray-700">{{ $gangguan->keterangan }}</p>
          </div>

          <!-- Penyebab -->
          <div>
            <p class="text-sm text-gray-500">Penyebab</p>
            <p class="text-base font-semibold text-red-500">{{ $gangguan->penyebab }}</p>
          </div>

          <!-- Alamat -->
          <div>
            <p class="text-sm text-gray-500">Alamat</p>
            <p class="text-base text-gray-700">{{ $gangguan->alamat }}</p>
          </div>

{{--
        <div class="mb-4">
          <p class="text-gray-700">{{ $gangguan->keterangan }}</p>
        </div> --}}

        <div class="flex justify-between items-center">
          <p class="text-sm italic text-gray-600">Status: <span class="font-semibold">{{ $gangguan->status }}</span></p>
          <p class="text-sm italic text-gray-600">Oleh: <span class="font-semibold">{{ $gangguan->user->username ?? 'Nama tidak ditemukan' }}</span></p>
        </div>
      </div>
    @endforeach
  </div>
</body>
</html>
