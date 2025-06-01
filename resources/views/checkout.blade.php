<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout</title>
</head>
<body>
    
<div class="container py-4">
    <h1 class="mb-4">Checkout</h1>
       <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary">
            &larr; Kembali ke Keranjang
        </a>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Informasi Pengiriman</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('checkout.place-order') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="customer_name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="customer_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="customer_phone" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="shipping_address" class="form-label">Alamat Lengkap</label>
                            <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3" required></textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Metode Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="transfer" value="transfer" checked>
                                <label class="form-check-label" for="transfer">
                                    Transfer Bank
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod">
                                <label class="form-check-label" for="cod">
                                    Cash on Delivery (COD)
                                </label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="notes" class="form-label">Catatan (Opsional)</label>
                            <textarea class="form-control" id="notes" name="notes" rows="2"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
                    </form>
                </div>
            </div>
        </div>
       

        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Ringkasan Pesanan</h4>
                </div>
                <div class="card-body">
                    @foreach($cartItems as $item)
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            {{ $item->product->nama }} (x{{ $item->quantity }})
                        </div>
                        <div>
                            Rp {{ number_format($item->product->harga * $item->quantity, 0, ',', '.') }}
                        </div>
                    </div>
                    @endforeach
                    
                    <hr>
                    
                    <div class="d-flex justify-content-between fw-bold">
                        <div>Total</div>
                        <div>Rp {{ number_format($cartItems->sum(function($item) { 
                            return $item->product->harga * $item->quantity; 
                        }), 0, ',', '.') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Refresh data cart setiap 5 detik
    setInterval(function() {
        fetch('{{ route("cart.index") }}')
            .then(response => response.text())
            .then(data => {
                // Anda bisa update bagian tertentu saja
                console.log('Cart updated');
            });
    }, 5000);
});
</script>
</body>
</html>

