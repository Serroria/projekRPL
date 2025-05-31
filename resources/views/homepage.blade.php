@extends('layout.main')

<!-- Katalog Home Page-->
@section('mainLayout')
<!-- 
  <!-- Slides -->

  
  <!-- <template x-for="(slide, index) in slides" :key="index">
    <img 
      x-show="currentSlide === index"
      :src="slide"
      alt="Poster Iklan"
      class="absolute inset-0 w-full h-full object-cover transition-opacity duration-1000"
      x-transition:enter="transition-opacity ease-in duration-700"
      x-transition:enter-start="opacity-0"
      x-transition:enter-end="opacity-100"
      x-transition:leave="transition-opacity ease-out duration-700"
      x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0"
    />
  </template> -->

  <!-- Navigation Buttons
  <button 
    @click="prev" 
    class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white text-3xl rounded-full p-2 hover:bg-opacity-75"
    aria-label="Previous"
  >
    &#10094;
  </button>
  <button 
    @click="next" 
    class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-black bg-opacity-50 text-white text-3xl rounded-full p-2 hover:bg-opacity-75"
    aria-label="Next"
  >
    &#10095;
  </button>  -->
{{-- </div> --}}

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
                <button class="buy-btn add-to-cart-btn" data-product-id="{{ $product->id }}">
  <i class="fa-solid fa-cart-shopping"></i>
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
    <div id="checkoutModal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden z-50">
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
            
            // Kirim request AJAX
            fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
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
                }
            })
            .catch(error => {
                showToast('Gagal menambahkan produk', 'error');
            });
        });
    });
    
    // Fungsi untuk menampilkan notifikasi toast
    function showToast(message, type = 'success') {
        const toast = document.querySelector('.toast-notification');
        toast.querySelector('.toast-message').textContent = message;
        
        // Set warna berdasarkan type
        toast.style.backgroundColor = type === 'success' ? '#4CAF50' : '#f44336';
        
        // Tampilkan toast
        toast.classList.add('show');
        
        // Sembunyikan setelah 3 detik
        setTimeout(() => {
            toast.classList.remove('show');
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
