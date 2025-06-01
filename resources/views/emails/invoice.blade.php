<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->order_number }}</title>
</head>
<body>
    <h2>Invoice Pesanan</h2>
    <p>Halo {{ $order->customer_name }},</p>
    
    <h3>Detail Pesanan #{{ $order->order_number }}</h3>
    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>Rp {{ number_format($item->price) }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price * $item->quantity) }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3" align="right"><strong>Total</strong></td>
                <td>Rp {{ number_format($order->total_amount) }}</td>
            </tr>
        </tfoot>
    </table>
    
    <p>Status Pesanan: <strong>{{ ucfirst($order->status) }}</strong></p>
    <p>Terima kasih telah berbelanja di toko kami!</p>
</body>
</html>