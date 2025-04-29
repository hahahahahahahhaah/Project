<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Halaman Tagihan</title>
  <script src="{{ config('midtrans.snap_url') }}"
  data-client-key="{{ config('midtrans.client_key') }}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
    }
    body {
      background-color: #f5f7fa;
      padding: 2rem;
    }
    .container {
      max-width: 800px;
      margin: auto;
    }
    .header {
      margin-bottom: 2rem;
    }
    .header h1 {
      font-size: 2rem;
      color: #333;
    }
    .bill-card {
      background-color: #fff;
      padding: 1.5rem;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      margin-bottom: 1.5rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transition: transform 0.2s ease;
    }
    .bill-card:hover {
      transform: scale(1.01);
    }
    .bill-info {
      display: flex;
      flex-direction: column;
    }
    .bill-info h2 {
      font-size: 1.1rem;
      margin-bottom: 0.3rem;
      color: #444;
    }
    .bill-info p {
      font-size: 0.95rem;
      color: #888;
    }
    .status {
      font-weight: 600;
      padding: 0.4rem 0.8rem;
      border-radius: 8px;
      font-size: 0.85rem;
      margin-bottom: 0.5rem;
      width: fit-content;
    }
    .paid {
      background-color: #d1f7d6;
      color: #2e7d32;
    }
    .unpaid {
      background-color: #ffe5e5;
      color: #c62828;
    }
    .btn-pay {
      padding: 0.5rem 1rem;
      background-color: #4f46e5;
      color: #fff;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .btn-pay:hover {
      background-color: #4338ca;
    }
    @media(max-width: 600px) {
      .bill-card {
        flex-direction: column;
        align-items: flex-start;
      }
      .btn-pay {
        width: 100%;
        margin-top: 1rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Halo, Norma! Ini Tagihanmu</h1>
    </div>

    @if($orders->isEmpty())
        <div class="bg-yellow-50 border border-yellow-200 text-yellow-800 px-6 py-6 rounded-xl shadow-md text-center transition duration-300">
            <p class="text-lg font-medium">Anda belum memiliki tagihan saat ini 🎉</p>
        </div>
    @else
        @foreach($orders as $order)
            <div class="bill-card">
                <div class="bill-info">
                    <h2>Tagihan Internet - {{ $order->created_at->format('F Y') }}</h2>
                    <span class="status {{ $order->status === 'Paid' ? 'paid' : 'unpaid' }}">
                        {{ $order->status === 'Paid' ? 'Lunas' : 'Belum Dibayar' }}
                    </span>
                    <p>Total: Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>
                </div>
                @if($order->status !== 'Paid')
                    <button class="btn-pay" data-id="{{ $order->id }}" data-token="{{ $order->snap_token }}">Bayar Sekarang</button>
                @else
                    <span class="text-gray-400 text-xs">N/A</span>
                @endif
            </div>
        @endforeach
    @endif
  </div>

  <script type="text/javascript">
    document.querySelectorAll('.btn-pay').forEach(button => {
      button.addEventListener('click', function () {
        const token = this.getAttribute('data-token');
        const orderId = this.getAttribute('data-id');

        if (!token) {
          alert("Token pembayaran tidak tersedia.");
          return;
        }

        window.snap.pay(token, {
          onSuccess: function(result) {
            window.location.href = '/invoice/' + orderId;
          },
          onPending: function(result) {
            alert("Menunggu pembayaran...");
            console.log(result);
          },
          onError: function(result) {
            alert("Pembayaran gagal!");
            console.log(result);
          },
          onClose: function() {
            alert('Popup pembayaran ditutup.');
          }
        });
      });
    });
  </script>
</body>
</html>
