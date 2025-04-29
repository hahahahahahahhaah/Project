<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback PDF</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Feedback Pelanggan</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Koneksi</th>
                <th>CS</th>
                <th>Teknisi</th>
                <th>Gangguan</th>
                <th>Kecepatan</th>
                <th>Harga</th>
                <th>Rekomendasi</th>
                <th>Saran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($feedback as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->koneksi }}</td>
                <td>{{ $item->puas_cs }}</td>
                <td>{{ $item->puas_teknisi }}</td>
                <td>{{ $item->gangguan }}</td>
                <td>{{ $item->kecepatan }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->rekomendasi }}</td>
                <td>{{ $item->saran }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
