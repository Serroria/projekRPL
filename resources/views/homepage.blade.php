@extends('layout.main')

<!-- Katalog Home Page-->
@section('mainLayout')
<div class= bg-[#f9f6ee] >
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>

    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      <a href="#" class="group">
        <img src="jamukita.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Kencur Beras</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
        <button href="#">BELI</button>
      </a>
      <a href="#" class="group">
        <img src="buyungupik.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Buyung upik</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
        <button onclick="location.href='https://shopee.co.id/';">BELI</button>
      </a>
      <a href="#" class="group">
        <img src="jamukita.jpg" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Temulawak</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
        <button href="#">BELI</button>
      </a>
      

      <a href="#" class="group">
        <img src="jamukita.jpg" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Temulawak</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
        <button href="#">BELI</button>
      </a>

      <a href="#" class="group">
        <img src="jamukita.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Kencur Beras</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$48</p>
        <button href="#">BELI</button>
      </a>
      <a href="#" class="group">
        <img src="buyungupik.jpg" alt="Olive drab green insulated bottle with flared screw lid and flat top." class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Buyung upik</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$35</p>
        <button onclick="location.href='https://shopee.co.id/';">BELI</button>
      </a>
      <a href="#" class="group">
        <img src="jamukita.jpg" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Temulawak</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
        <button href="#">BELI</button>
      </a>
      

      <a href="#" class="group">
        <img src="jamukita.jpg" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
        <h3 class="mt-4 text-sm text-gray-700">Temulawak</h3>
        <p class="mt-1 text-lg font-medium text-gray-900">$89</p>
        <button href="#">BELI</button>
      </a>

      <!-- More products... -->
    </div>
    
  </div>
</div>

@endsection