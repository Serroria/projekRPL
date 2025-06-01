<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CART</title>
      @vite('resources/css/header.css') 
      @vite('resources/css/hamburger.css')
    @vite('resources/js/hamburger.js')
    @vite('resources/css/cart.css') 
       
</head>
<body class="body-cart">

    <header>
          @include('partial.navBar')
    </header>
    <main class="container-cart">
<h2>Keranjang Belanja</h2>

@if($cartItems->count() > 0)
<table class="table-cart">
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
                <form class="form-inline-cart" action="{{ route('cart.update', $item) }}" method="POST">
                    @csrf
                   
                    <div class="input-group-cart">
                        <div class="quantity-wrapper">
    <button type="button" class="btn-qty minus">-</button>
    <input class="input-jumlah" type="number" name="quantity" value="{{ $item->quantity }}" min="1">
    <button type="button" class="btn-qty plus">+</button>
</div>

                        {{-- <input class="input-jumlah"  type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control-cart"> --}}
                        <button class="tombol-update" type="submit" class="btn-cart btn-sm btn-cart-outline-secondary">Update</button>
                    </div>
                </form>
            </td>
            <td>Rp {{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}</td>
            <td>
                <form action="{{ route('cart.remove', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-cart btn-cart-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr class="table-footer-cart">
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            <td></td>
        </tr>
    </tbody>
</table>

<div class="button-group-cart">
<a href="{{ route('checkout') }}" class="btn-cart btn-cart-primary">Checkout</a>
    </div>
@else
<div class="alert-cart alert-info-cart">Keranjang belanja kosong</div>
 


@endif
<div class="button-group-cart">
<a href="{{ url('/home') }}" class="btn-cart btn-cart-secondary">Lanjut Belanja</a>
  </div>

</main>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.quantity-wrapper').forEach(wrapper => {
            const input = wrapper.querySelector('input[type="number"]');
            const btnMinus = wrapper.querySelector('.minus');
            const btnPlus = wrapper.querySelector('.plus');

            btnMinus.addEventListener('click', function () {
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            });

            btnPlus.addEventListener('click', function () {
                let value = parseInt(input.value);
                input.value = value + 1;
            });
        });
    });
</script>

</body>
</html>

