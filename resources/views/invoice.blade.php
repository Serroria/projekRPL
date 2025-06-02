

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
        .btn { padding: 10px 15px; border: none; background: #3490dc; color: white; text-decoration: none; border-radius: 4px; margin-right: 10px; }
        .btn-success { background-color: #38c172; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div class="logo">JamuKita</div>
            <div class="invoice-details">
                <h2>INVOICE</h2>
                <p>No: {{ $order->order_number }}</p>
                <p>Tanggal: {{$order->created_at ? $order->created_at->format('d/m/Y') : '-' }}</p>
            </div>
        </div>

        <div style="margin-bottom: 30px;">
            <strong>Kepada:</strong><br>
            {{ $order->customer_name }}<br>
            {{ $order->customer_email }}<br>
            {{ $order->customer_phone }}<br>
            {{ $order->shipping_address }}
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
            {{-- <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p> --}}
            @if($order->notes)
            <p><strong>Catatan:</strong> {{ $order->notes }}</p>
            @endif
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja di Toko Online kami</p>
            <p>Invoice ini sah dan diproses oleh sistem</p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('invoice.download', $order->order_number) }}" class="btn">Download PDF</a>

            @php
                $whatsappUrl = "https://wa.me/" . preg_replace('/[^0-9]/', '', $order->customer_phone) . "?text=";
                $message = "Halo $order->customer_name,%0A%0A";
                $message .= "Invoice Pesanan #$order->order_number%0A";
                $message .= "Total: Rp " . number_format($order->total_amount, 0, ',', '.') . "%0A%0A";
                $message .= "Lihat detail: " . route('invoice.show', $order->id);
                $whatsappUrl .= urlencode($message);
            @endphp

            {{-- <form action="{{ route('invoice.send', $order->order_number) }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" name="method" value="email" class="btn">Kirim via Email</button>
            </form> --}}

            <a href="{{ $whatsappUrl }}" target="_blank" class="btn btn-success">Kirim via WhatsApp</a>
        </div>
    </div>
</body>
</html> 
{{-- 
@component('mail::message')
# Terima Kasih, {{ $order->customer_name }}

Pesanan Anda telah kami terima. Berikut ringkasannya:

**Nomor Pesanan:** #{{ $order->order_number }}  
**Tanggal:** {{ $order->created_at->format('d M Y') }}  
**Total:** Rp {{ number_format($order->total_amount, 0, ',', '.') }}  
**Metode Pembayaran:** {{ ucfirst($order->payment_method) }}  
**Alamat Pengiriman:** {{ $order->shipping_address }}

@component('mail::table')
| Produk        | Qty | Harga Satuan | Subtotal  |
|--------------|-----|---------------|-----------|
@foreach($order->items as $item)
| {{ $item->product->name }} | {{ $item->quantity }} | Rp {{ number_format($item->price, 0, ',', '.') }} | Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }} |
@endforeach
@endcomponent

@component('mail::button', ['url' => route('invoice', $order->id)])
Lihat Invoice
@endcomponent

Terima kasih telah berbelanja di {{ config('app.name') }}  
Salam hangat,  
{{ config('app.name') }}
@endcomponent --}}



{{-- 
@component('mail::message')
# Terima Kasih {{ $order->customer_name }}

Pesanan Anda telah kami terima. Berikut ringkasannya:

- Metode: {{ $order->payment_method }}
- Alamat: {{ $order->shipping_address }}

@component('mail::button', ['url' => route('orders.show', $order->id)])
Lihat Detail
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent --}}




{{-- <!DOCTYPE html>
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
</html> --}}