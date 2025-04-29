<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Page</title>

    <script src="{{ config('midtrans.snap_url') }}"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
{{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <h2>Bayar Paket: {{ $paket->nama_paket }}</h2>
    <p>Harga: Rp{{ number_format($paket->harga, 0, ',', '.') }}</p>

    <button id="pay-button">Bayar Sekarang</button>


    <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            // Trigger snap popup. @TODO: Replacee
            //  TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{$snapToken}}', {
                onSuccess: function (result) {
                    /* You may add your own implementation here */
                    // alert("payment success!");
                    window.location.href = '/invoice/{{$order->id}}'
                    console.log(result);
                },
                onPending: function (result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function (result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function () {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });

    </script>

    {{-- <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            fetch('{{ route('payment.process') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    paket_id: {{ $paket->id }}
                })
            })
            .then(response => response.json())
            .then(data => {
                window.snap.pay(data.snapToken, {
                    onSuccess: function(result){
                        alert("Pembayaran berhasil!");
                        console.log(result);
                    },
                    onPending: function(result){
                        alert("Menunggu pembayaran.");
                        console.log(result);
                    },
                    onError: function(result){
                        alert("Pembayaran gagal!");
                        console.log(result);
                    }
                });
            });
        });
    </script> --}}
</body>
</html>

