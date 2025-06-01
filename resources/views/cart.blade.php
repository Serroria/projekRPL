<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CART</title>
</head>
<body>
<h2>Keranjang Belanja</h2>

@if($cartItems->count() > 0)
<table class="table">
    <thead>
        <tr>
            <th>Produk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $item)
        <tr>
            <td>{{ $item->product->nama }}</td>
            <td>Rp {{ number_format($item->product->harga, 0, ',', '.') }}</td>
            <td>
                <form action="{{ route('cart.update', $item) }}" method="POST">
                    @csrf
                   
                    <div class="input-group">
                        <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control">
                        <button type="submit" class="btn btn-sm btn-outline-secondary">Update</button>
                    </div>
                </form>
            </td>
            <td>Rp {{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}</td>
            <td>
                <form action="{{ route('cart.remove', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            <td></td>
        </tr>
    </tbody>
</table>

<a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>
@else
<div class="alert alert-info">Keranjang belanja kosong</div>
@endif

<a href="{{ url('/home') }}" class="btn btn-secondary">Lanjut Belanja</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    updateCartCounter(); // ← Tambahkan ini agar counter tetap sinkron di halaman manapun

    function updateCartCounter() {
        fetch('/cart/count')
            .then(response => response.json())
            .then(data => {
                const counter = document.querySelector('.cart-count');
                if (counter) {
                    counter.textContent = data.count;
                    counter.style.display = data.count > 0 ? 'inline-block' : 'none';
                }
            });
    }
});
</script>

</body>
</html>

