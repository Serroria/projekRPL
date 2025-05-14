@extends('layout.main')

<!-- Katalog Home Page-->
@section('mainLayout')

  <!-- Slides -->
  <template x-for="(slide, index) in slides" :key="index">
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
  </template>

  <!-- Navigation Buttons -->
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
  </button>
</div>

<div class= bg-[#f9f6ee] >
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>

    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      <a href="#" class="group">
        <img src="kencurberas.png" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Beras Kencur</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Minuman Herbal'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 8.500,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">BELI</button>
      </a>
      
      <a href="#" class="group">
        <img src="buyungupik.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Buyung upik</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Jamu Anak'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 7.600,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">BELI</button>
      </a>

      <a href="#" class="group">
        <img src="sari-temulawak.png" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Sari Temulawak</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Minuman Herbal'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 85.000,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">BELI</button>
      </a>
      

      <a href="#" class="group">
        <img src="encok.png" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Jamu Encok</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Jamu Herbal'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/JAMU-ENCOK-Sido-Muncul-i.217988839.40650755375';">BELI</button>
      </a>

      <a href="#" class="group">
        <img src="{{ asset('jamu-bersalin.png') }}" alt="Jamu Pegal Linu" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Jamu Bersalin</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Jamu Herbal'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 3.000,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/JAMU-BERSALIN-Sido-Muncul-i.217988839.43250749369';">BELI</button>
      </a>

      <a href="#" class="group">
        <img src="{{ asset('jamu-klingsir.png') }}" alt="Jamu Klingsir" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Jamu Klingsir</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Jamu Herbal'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 18.000,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/JAMU-KLINGSIR-Sido-Muncul-i.217988839.41700776478';">BELI</button>
      </a>

      <a href="#" class="group">
        <img src="{{ asset('jamu-gemuk-sehat.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Jamu Gemuk Sehat</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Jamu Herbal'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 18.000,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/JAMU-GEMUK-SEHAT-Sido-Muncul-i.217988839.40800771846';">BELI</button>
      </a>

      <a href="#" class="group">
        <img src="{{ asset('jamu-galian-montok.png') }}" alt="Jamu Galian Montok" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Jamu Galian Montok</h3>
        <h3 class="mt-4 text-sm text-gray-700">'Jamu Herbal'</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">Rp. 18.000,00</p>
        <button button class="bg-orange-950 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" onclick="location.href='https://shopee.co.id/JAMU-GALIAN-MONTOK-Sido-Muncul-i.217988839.27886556918';">BELI</button>
      </a>


      <!-- More products... -->
    </div>
    
  </div>
</div>

@endsection