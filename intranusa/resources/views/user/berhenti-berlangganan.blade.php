<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berhenti Berlangganan</title>
</head>
<body>
    <h1>Berhenti Berlangganan</h1>

    <p>Status Langganan Anda: <strong>{{ $pelanggan->status_langganan ?? 'Tidak Ada' }}</strong></p>

    @if($pelanggan && $pelanggan->status_langganan == 'Aktif')
        <form action="{{ route('cancel.subscription') }}" method="POST">
            @csrf
            <button type="submit">Ajukan Berhenti Berlangganan</button>
        </form>
    @elseif($pelanggan && $pelanggan->status_langganan == 'Pending')
        <p>Permintaan pembatalan Anda sedang menunggu persetujuan admin.</p>
    @elseif($pelanggan && $pelanggan->status_langganan == 'Dihentikan')
        <p>Langganan Anda telah dihentikan.</p>
    @else
        <p>Anda tidak memiliki langganan aktif.</p>
    @endif
</body>
</html>
