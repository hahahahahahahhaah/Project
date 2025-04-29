
<div class="container">
    <h1 class="mb-4">Daftar Permintaan Berhenti Berlangganan</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Email</th>
                <th>Lokasi Pemasangan</th>
                <th>Nomor WA</th>
                <th>Status Langganan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pendingCancellations as $pelanggan)
                <tr>
                    <td>{{ $pelanggan->nama_pelanggan }}</td>
                    <td>{{ $pelanggan->email }}</td>
                    <td>{{ $pelanggan->lokasi_pemasangan }}</td>
                    <td>{{ $pelanggan->no_handphone_wa }}</td>
                    <td>{{ $pelanggan->status_langganan }}</td>
                    <td>
                        <form action="{{ url('/admin/approve-cancel/'.$pelanggan->user_id.'/approve') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">Setujui</button>
                        </form>
                        <form action="{{ url('/admin/approve-cancel/'.$pelanggan->user_id.'/reject') }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada permintaan berhenti berlangganan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
