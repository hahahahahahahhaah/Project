<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Data Pelanggan</title>
    <style>
        body { font-family: Arial, sans-serif;  font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .logo { width: 80px; }
        .company-info { text-align: right; }

    </style>
</head>
<body>
    <div class="header">
        {{-- <img src="{{ asset('Llogo.png') }}" alt="Company Logo" style="width: 100px; height: auto;"> --}}
        {{-- <img src="{{ public_path('images/Llogo.png') }}" style="width: 150px; height: auto;" alt="Company Logo"> --}}

        {{-- <img src="{{ public_path('images/Llogo.png') }}" width="100"> --}}
        {{-- <img src="{{ $imagePath }}" width="200" alt="Logo Perusahaan"> --}}

        {{-- <img src="{{ asset('images/Llogo.png') }}" width="200" alt="Logo Perusahaan"> --}}
        {{-- <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/Llogo.png'))) }}"> --}}
        {{-- <img src="{{ $imagePath }}" style="width: 150px; height: auto;"> --}}
        <img src="{{ public_path('images/Llogo.png') }}" style="width: 150px; height: auto;">

        <div class="company-info">
            <h3>Intranusa.id</h3>
            <p>Jl.Graha Arradea Blok CB no 2, Ciherang, Dramaga, Bogor Regency</p>
            <p>+62 877 1424 247 | intranusa.id@gmail.com</p>
            <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
        </div>
    </div>

    <h2>Daftar Berlangganan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Lokasi Pemasangan</th>
                <th>Paket</th>
                <th>NIK</th>
                <th>No HP WA</th>
                <th>No HP 2</th>
                <th>NPWP</th>
                <th>Alamat Lengkap</th>
                <th>Sumber Informasi</th>
                <th>Tanggal Mulai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $key => $p)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $p->nama_pelanggan }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->lokasi_pemasangan }}</td>
                <td>{{ $p->paket }}</td>
                <td>{{ $p->nik }}</td>
                <td>{{ $p->no_handphone_wa }}</td>
                <td>{{ $p->no_handphone_2 }}</td>
                <td>{{ $p->npwp }}</td>
                <td>{{ $p->alamat_lengkap }}</td>
                <td>{{ $p->sumber_informasi }}</td>
                <td>{{ $p->created_at->format('d-m-Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Total Pelanggan Masuk:</strong> {{ $pelanggan->count() }} Orang</p>
</body>
</html>
