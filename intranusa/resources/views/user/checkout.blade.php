<!DOCTYPE html>
<html>
<head>
    <title>Checkout Pembayaran</title>
    {{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> --}}
    {{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> --}}
    <script src="{{ config('midtrans.snap_url') }}"
    data-client-key="{{ config('midtrans.client_key') }}"></script>

</head>
<body>
    <h2>Checkout Pembayaran</h2>

    <p>Nama Paket: {{ $order->paket->nama ?? 'N/A' }}</p>
    <p>Harga: Rp{{ number_format($order->total_price) }}</p>
    <p>Status: {{ $order->status }}</p>

    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran berhasil!");
                    window.location.href = '/invoice/{{ $order->id }}';
                },
                onPending: function(result){
                    alert("Menunggu pembayaran Anda...");
                },
                onError: function(result){
                    alert("Pembayaran gagal. Silakan coba lagi.");
                }
            });
        });
    </script>
</body>
</html>


