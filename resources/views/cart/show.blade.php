

<h1>Keranjang Belanja</h1>

@if(session('error'))
  <p style="color:red;">{{ session('error') }}</p>
@endif

@if(session('success'))
  <p style="color:green;">{{ session('success') }}</p>
@endif

@if(count($cart) > 0)
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0; @endphp
        @foreach($cart as $item)
            @php
                $subtotal = $item['harga'] * $item['qty'];
                $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" align="right"><strong>Subtotal</strong></td>
            <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><strong>Ongkir</strong></td>
            <td><strong>Rp 4.999</strong></td>
        </tr>
        <tr>
            <td colspan="3" align="right"><strong>Total</strong></td>
            <td><strong>Rp {{ number_format($total + 4999, 0, ',', '.') }}</strong></td>
        </tr>
    </tbody>
</table>

<form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
    <button type="submit" style="margin-top: 20px;">Checkout</button>
</form>

@else
<p>Keranjang belanja Anda kosong.</p>
@endif


