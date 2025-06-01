<!DOCTYPE html>
<html>
<head>
    <title>Invoice #{{ $order->order_number }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; }
        .header { display: flex; justify-content: space-between; margin-bottom: 20px; }
        .logo { font-size: 24px; font-weight: bold; }
        .invoice-details { text-align: right; }
        table { width: 100%; border-collapse: collapse; }
        table td, table th { padding: 12px; border-bottom: 1px solid #eee; text-align: left; }
        .total { font-weight: bold; font-size: 18px; }
        .text-right { text-align: right; }
        .footer { margin-top: 50px; font-size: 12px; text-align: center; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div class="logo">Toko Online</div>
            <div class="invoice-details">
                <h2>INVOICE</h2>
                <p>No: {{ $order->order_number }}</p>
                <p>Tanggal: {{ $order->created_at->format('d/m/Y') }}</p>
            </div>
        </div>
        
        <div style="margin-bottom: 30px;">
            <div><strong>Kepada:</strong></div>
            <div>{{ $order->customer_name }}</div>
            <div>{{ $order->customer_email }}</div>
            <div>{{ $order->customer_phone }}</div>
            <div>{{ $order->shipping_address }}</div>
        </div>
        
        <table>
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
                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                    <td class="total">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
        
        <div style="margin-top: 20px;">
            <p><strong>Metode Pembayaran:</strong> {{ ucfirst($order->payment_method) }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            @if($order->notes)
            <p><strong>Catatan:</strong> {{ $order->notes }}</p>
            @endif
        </div>
        
        <div class="footer">
            <p>Terima kasih telah berbelanja di Toko Online kami</p>
            <p>Invoice ini sah dan diproses oleh komputer</p>
        </div>
    </div>
    
    <div class="text-center mt-3">
        <a href="{{ route('invoice.download', $order->order_number) }}" class="btn btn-primary">Download Invoice</a>
    </div>

     <div class="mt-4">
        <h4>Kirim Invoice:</h4>
        <form action="{{ route('invoice.send', $order->order_number) }}" method="POST">
            @csrf
            <button type="submit" name="method" value="email" class="btn btn-primary">
                Kirim via Email
            </button>
            
            <a href="{{ $whatsappUrl }}" target="_blank" class="btn btn-success">
                Kirim via WhatsApp
            </a>
        </form>
    </div>
</div>

@php
    $whatsappUrl = "https://wa.me/".preg_replace('/[^0-9]/', '', $order->customer_phone)."?text=";
    $message = "Halo ".$order->customer_name.",%0A%0A";
    $message .= "Invoice Pesanan #".$order->order_number."%0A";
    $message .= "Total: Rp ".number_format($order->total_amount)."%0A%0A";
    $message .= "Detail lengkap: ".url()->current();
    $whatsappUrl .= $message;
@endphp
</body>
</html>