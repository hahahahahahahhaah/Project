{{-- resources/views/invoice.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            color: #333;
        }
        .invoice-box {
            max-width: 800px;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px #ddd;
        }
        h1, h2, h3 {
            margin-top: 0;
        }
        .info, .items, .total {
            margin-top: 30px;
        }
        .items table {
            width: 100%;
            border-collapse: collapse;
        }
        .items th, .items td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .items th {
            background-color: #f9f9f9;
        }
        .total {
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <h2>Invoice</h2>
        <p><strong>Invoice ID:</strong> {{ $order->id }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>

        <div class="info">
            <h4>Customer Info</h4>
            <p><strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>
            <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
        </div>

        <div class="items">
            <h4>Order Details</h4>
            <table>
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->description ?? 'Paket Internet' }}</td>
                        <td>{{ number_format($order->gross_amount, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="total">
            <h3>Total: Rp {{ number_format($order->gross_amount, 0, ',', '.') }}</h3>
        </div>
    </div>
</body>
</html>
