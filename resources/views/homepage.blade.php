@extends('layout.main')

<!-- Katalog Home Page-->
@section('mainLayout')



<div class= bg-[#f9f6ee] >
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      @foreach ($products as $product )
      
    
      <div class="max-w-sm mx-auto product-card" data-category="{{ $product->category->nama }}">
        <div class="group block">
          <img src="{{ asset('storage/'.$product->gambar) }}" alt="{{ $product->nama }}" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
          
          <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc({{ $product->id }})">
            <h3 class="text-sm text-gray-700 font-semibold flex items-center">
              {{ $product->nama }}
              <span id="arrowIcon-{{ $product->id }}" class="ml-2 transition-transform">▼</span>
            </h3>
          </div>


<!-- Deskripsi -->
      <div id="descBox-{{ $product->id }}" class="hidden mt-2 text-sm text-gray-600">
          {!! nl2br(e($product->deskripsi)) !!}
      </div>
        <h3><strong>Kategori:</strong> {{ $product->category->nama }}</h3>
        {{-- <p><strong>Stok:</strong> {{ $product->stok }}</p> --}}

            <p><strong>Harga:</strong> Rp. {{ number_format($product->harga, 2, ',', '.') }}</p>
          {{-- <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded" 
            onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
            BELI
          </button> --}}
          {{-- <button onclick="toggleCheckout()"class="buy-btn">Checkout</button>--}}
  <form action="{{ route('cart.add') }}" method="POST"> 
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="input-group mb-3">
                        <input type="number" name="quantity" value="1" min="1" class="form-control">
                         <button class="buy-btn" type="submit">
  <i class="fa-solid fa-cart-shopping"> CheckOut NOW</i>
</button>

                    </div>
                </form>
                
                <button  class="buy-btn add-to-cart-btn" data-product-id="{{ $product->id }}">
  <i class="fa-solid fa-cart-shopping">add</i>
</button>
         
         {{-- <button 
  class="buy-btn"
  data-product-id="{{ $product->id }}"
  data-product-name="{{ $product->nama }}"
  data-price="{{ $product->harga }}"
>
  <i class="fa-solid fa-cart-shopping"></i>
</button> --}}
        </div>
    </div>

    

          @endforeach
      <!-- More products... -->

      <!-- Notifikasi Toast -->
<div class="toast-notification">
    <span class="toast-message"></span>
</div>
  </div>
</div>

</div>
<!-- POP-UP MODAL -->
    <div id="checkoutModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 justify-center items-center hidden z-50">
      <div class="bg-white p-6 rounded-lg shadow-lg w-96">
        <h2 class="text-xl font-semibold mb-4">Checkout</h2>
        <div id="cartItems" class="mb-4"></div>
            <p class="font-semibold">Subtotal: <span id="cartSubtotal">Rp0</span></p>
            <p class="font-semibold">Ongkir: Rp4.999</p>
            <hr class="my-2">
            <p class="font-bold text-lg">Total: <span id="totalHarga"></span></p>
            <button class="mt-4 bg-blue-600 hover:bg-blue-800 text-white py-2 px-4 rounded"         onclick="toggleCheckout()">        Tutup
              </button>
        </div>
      </div>

      <!-- Modal Struktur -->
<div id="info-modal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close-modal">&times;</span>
    <div id="modal-title" style="font-weight: bold; font-size: 18px; margin-bottom: 10px;"></div>
    <div id="modal-body"></div>
  </div>
</div>


      
    
  </div>

</div>

@endsection

<script>
  
window.toggleDesc = function(id) {
  const descBox = document.getElementById('descBox-' + id);
    const arrowIcon = document.getElementById('arrowIcon-' + id);

    if (descBox.classList.contains('hidden')) {
      descBox.classList.remove('hidden');
      arrowIcon.innerHTML = '▲';
    } else {
      descBox.classList.add('hidden');
      arrowIcon.innerHTML = '▼';
    }
}
  </script>

  <script>
 document.addEventListener('DOMContentLoaded', function() {
    // Tangani klik tombol add to cart
    document.querySelectorAll('.add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.productId;
            const button = this;

// Tampilkan loading state
            button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';
            button.disabled = true;
            

            // Kirim request AJAX
            fetch('/cart/add-ajax',  {
                method: 'POST',
                headers: {
                     'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: 1
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan notifikasi
                    showToast('Produk berhasil ditambahkan ke keranjang!');
                    
                    // Update counter keranjang jika ada
                    updateCartCounter();
                }else {
                  showToast(data.message || 'Gagal menambahkan produk', 'error')
                }
            })
            .catch(error => {
                showToast('Terjadi kesalahan', 'error');
            })
            .finally(() => {
                // Kembalikan tampilan tombol ke semula
                button.innerHTML = '<i class="fa-solid fa-cart-shopping"></i> Add to Cart';
                button.disabled = false;
            });
        });
    });
    
    // Fungsi untuk menampilkan notifikasi toast
    function showToast(message, type = 'success') {
        const toast = document.createElement('div');
        toast.className = `toast-notification ${type}`;
        toast.innerHTML = `
            <span class="toast-message">${message}</span>
        `;
        
        document.body.appendChild(toast);
        
        // Tampilkan toast
        setTimeout(() => toast.classList.add('show'), 10);
        
        // Sembunyikan setelah 3 detik
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }       
    
    // Fungsi untuk update counter keranjang
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
