<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pelanggan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-2xl font-bold text-gray-700 mb-6">Laporan Data Pelanggan</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-4 py-3 border">No</th>
                        <th class="px-4 py-3 border">Nama</th>
                        <th class="px-4 py-3 border">Email</th>
                        <th class="px-4 py-3 border">Lokasi Pemasangan</th>
                        <th class="px-4 py-3 border">Paket</th>
                        <th class="px-4 py-3 border">NIK</th>
                        <th class="px-4 py-3 border">No. HP (WA)</th>
                        <th class="px-4 py-3 border">No. HP (2)</th>
                        <th class="px-4 py-3 border">NPWP</th>
                        <th class="px-4 py-3 border">Alamat Lengkap</th>
                        <th class="px-4 py-3 border">Sumber Informasi</th>
                        <th class="px-4 py-3 border">Tanggal Bergabung</th>
                        <th class="px-4 py-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm divide-y divide-gray-200">
                    @foreach ($pelanggan as $index => $p)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 text-center border">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border">{{ $p->nama_pelanggan }}</td>
                        <td class="px-4 py-3 border">{{ $p->email }}</td>
                        <td class="px-4 py-3 border">{{ $p->lokasi_pemasangan }}</td>
                        <td class="px-4 py-3 border">{{ $p->paket }}</td>
                        <td class="px-4 py-3 border">{{ $p->nik }}</td>
                        <td class="px-4 py-3 border">{{ $p->no_handphone_wa }}</td>
                        <td class="px-4 py-3 border">{{ $p->no_handphone_2 }}</td>
                        <td class="px-4 py-3 border">{{ $p->npwp }}</td>
                        <td class="px-4 py-3 border">{{ $p->alamat_lengkap }}</td>
                        <td class="px-4 py-3 border">{{ $p->sumber_informasi }}</td>
                        <td class="px-4 py-3 text-center border">{{ $p->created_at->format('d-m-Y') }}</td>
                        <td class="px-4 py-3 text-center border">
                            <a href="{{ route('laporan.view') }} "class="bg-blue-500 text-white px-3 py-1 rounded text-xs hover:bg-blue-600 transition">View</a>
                            <a href="{{ route('laporan.download') }}" class="bg-green-500 text-white px-3 py-1 rounded text-xs hover:bg-green-600 transition">Download</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
