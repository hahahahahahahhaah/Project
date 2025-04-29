<!-- resources/views/user/form/payment.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
</head>
<body>
    <h2>Proses Pembayaran</h2>
    <button id="pay-button">Bayar Sekarang</button>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran berhasil!");
                    window.location.href = "{{ route('user.form.success') }}";
                },
                onPending: function(result){
                    alert("Menunggu pembayaran...");
                    window.location.href = "{{ route('user.form.success') }}";
                },
                onError: function(result){
                    alert("Pembayaran gagal!");
                    console.log(result);
                },
                onClose: function(){
                    alert("Anda menutup popup pembayaran.");
                }
            });
        });
    </script>
</body>
</html>
