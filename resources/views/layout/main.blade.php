<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JamuKita|Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="resources/css/footer.css">
    <link rel="stylesheet" href="resources/css/home.css">
    <link rel="stylesheet" href="{{ asset('css/posterslide.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" href="{{ asset('iconLogo.png') }}" type="image/png">
   
    @vite('resources/css/app.css')
    @vite('resources/css/hamburger.css')
    @vite('resources/css/posterSlide.css')
    
    @vite('resources/css/category.css') 
   
    
    @vite('resources/js/category.js')
    @vite('resources/js/hamburger.js')
    @vite('resources/js/posterSlide.js')

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>


<body>
<!-- <div class= bg-[#f9f6ee]>
  <!--
    Mobile menu

    Off-canvas menu for mobile, show/hide based on off-canvas menu state.
  -->
  <!-- <div class="relative z-40 lg:hidden" role="dialog" aria-modal="true"> -->
    <!--
      Off-canvas menu backdrop, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <!-- <div class="fixed inset-0 bg-black/25" aria-hidden="true"></div>

    <div class="fixed inset-0 z-40 flex"> -->
      <!--
        Off-canvas menu, show/hide based on off-canvas menu state.

        Entering: "transition ease-in-out duration-300 transform"
          From: "-translate-x-full"
          To: "translate-x-0"
        Leaving: "transition ease-in-out duration-300 transform"
          From: "translate-x-0"
          To: "-translate-x-full"
      -->
      <!-- <div  class="relative flex w-full max-w-xs flex-col overflow-y-auto bg-[#f9f6ee] pb-12 shadow-xl">
        <div class="flex px-4 pt-5 pb-2">
          <button type="button" class="relative -m-2 inline-flex items-center justify-center rounded-md p-2 text-gray-400">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Close menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div> -->

        <!-- Links -->
        <!-- <div class="mt-2">
          <div class="border-b border-gray-200">
            <div class="-mb-px flex space-x-8 px-4" aria-orientation="horizontal" role="tablist">
              <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
              <!-- <button id="tabs-1-tab-1" class="flex-1 border-b-2 border-transparent px-1 py-4 text-base font-medium bg-[#f9f6ee]  text-gray-900" aria-controls="tabs-1-panel-1" role="tab" type="button">Women</button> -->
              <!-- Selected: "border-indigo-600 text-indigo-600", Not Selected: "border-transparent text-gray-900" -->
              <!-- <button id="tabs-1-tab-2" class="flex-1 border-b-2 border-transparent px-1 py-4 text-base font-medium bg-[#f9f6ee]  text-gray-900" aria-controls="tabs-1-panel-2" role="tab" type="button">Men</button>
            </div>
          </div> --> 

          <!-- 'Women' tab panel, show/hide based on tab state. -->
          <!-- <div id="tabs-1-panel-1" class="space-y-10 px-4 pt-10 pb-8" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
            <div class="grid grid-cols-2 gap-x-4">
              <div class="group relative text-sm">
                <img src="jamu.png" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                <a href="#" class="mt-6 block font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  New Arrivals
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div>  -->
              <!-- <div class="group relative text-sm">
                <img src="https://tailwindcss.com/plus-assets/img/ecommerce-images/mega-menu-category-02.jpg" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                <a href="#" class="mt-6 block font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Basic Tees
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div>
            </div> -->
            <!-- <div>
              <p id="women-clothing-heading-mobile" class="font-medium text-gray-900">Minuman Herbal</p>
              <ul role="list" aria-labelledby="women-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Dresses</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Denim</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                </li>
              </ul>
            </div> -->
            <!-- <div>
              <p id="women-accessories-heading-mobile" class="font-medium text-gray-900">Jamu Anak</p>
              <ul role="list" aria-labelledby="women-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                </li>
              </ul>
            </div> -->
            <!-- <div>
              <p id="women-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
              <ul role="list" aria-labelledby="women-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Significant Other</a>
                </li>
              </ul>
            </div>
          </div> -->
          <!-- 'Men' tab panel, show/hide based on tab state. -->
          <!-- <div id="tabs-1-panel-2" class="space-y-10 px-4 pt-10 pb-8" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
            <div class="grid grid-cols-2 gap-x-4">
              <div class="group relative text-sm">
                <img src="jamu.png" alt="Drawstring top with elastic loop closure and textured interior padding." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                <a href="#" class="mt-6 block font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  New Arrivals
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div> -->
              <!-- <div class="group relative text-sm">
                <img src="jamu.png" alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                <a href="#" class="mt-6 block font-medium text-gray-900">
                  <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                  Artwork Tees
                </a>
                <p aria-hidden="true" class="mt-1">Shop now</p>
              </div>
            </div> -->
            <!-- <div>
              <p id="men-clothing-heading-mobile" class="font-medium text-gray-900">Obat Herbal</p>
              <ul role="list" aria-labelledby="men-clothing-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Tops</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Pants</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Sweaters</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">T-Shirts</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Jackets</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Activewear</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Browse All</a>
                </li>
              </ul>
            </div> -->
            <!-- <div>
              <p id="men-accessories-heading-mobile" class="font-medium text-gray-900">Accessories</p>
              <ul role="list" aria-labelledby="men-accessories-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Watches</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Wallets</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Bags</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Sunglasses</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Hats</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Belts</a>
                </li>
              </ul>
            </div> -->
            <!-- <div>
              <p id="men-brands-heading-mobile" class="font-medium text-gray-900">Brands</p>
              <ul role="list" aria-labelledby="men-brands-heading-mobile" class="mt-6 flex flex-col space-y-6">
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Re-Arranged</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Counterfeit</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">Full Nelson</a>
                </li>
                <li class="flow-root">
                  <a href="#" class="-m-2 block p-2 text-gray-500">My Way</a>
                </li>
              </ul>
            </div>
          </div>
        </div> -->

        <!-- <div class="space-y-6 border-t border-gray-200 px-4 py-6">
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Company</a>
          </div>
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Stores</a>
          </div>
        </div> -->

        <!-- <div class="space-y-6 border-t border-gray-200 px-4 py-6">
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Sign in</a>
          </div>
          <div class="flow-root">
            <a href="#" class="-m-2 block p-2 font-medium text-gray-900">Create account</a>
          </div>
        </div> -->

        <!-- <div class="border-t border-gray-200 px-4 py-6">
          <a href="#" class="-m-2 flex items-center p-2">
            <img src="https://tailwindcss.com/plus-assets/img/flags/flag-canada.svg" alt="" class="block h-auto w-5 shrink-0">
            <span class="ml-3 block text-base font-medium text-gray-900">CAD</span>
            <span class="sr-only">, change currency</span>
          </a>
        </div>
      </div>
    </div>
  </div> -->


  <!---navigation bar--->
  
  @include('partial.navBar')
  
</div>

<!-- Poster Slider -->
 <div class="container">
@yield('content')
 <div class="img-slider-container">@include('partial.posterSlide')</div>
  
 <!--Kategori-->

@include('partial.category')
 </div>
<!-- <div tes
  x-data="{
    currentSlide: 0,
    slides: ['image/poster1.png', 'image/poster2.png',],
    next() {
      this.currentSlide = (this.currentSlide + 1) % this.slides.length;
    },
    prev() {
      this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
    },
    init() {
      setInterval(() => {
        this.next();
      }, 5000);
    }
  }" 
  class="relative w-full h-[410px] overflow-hidden"
></div> -->




@yield('mainLayout')


<footer class="bg-[#902727] text-white py-6 mt-12">
  <div class="container mx-auto flex flex-col items-center justify-center">
    <!-- Logo -->
    <img src="{{ asset('iconLogo.png') }}" alt="Logo JamuKita" class="w-12 h-12 mb-4" />

    <!-- Grid Footer -->
    <div class="w-full max-w-5xl grid grid-cols-1 md:grid-cols-3 gap-8 text-center items-center mt-6">
      <!-- Tentang Kami -->
      <div>
        <h3 class="text-lg font-semibold mb-2">Tentang Kami</h3>
        <p>Kami adalah UMKM yang bergerak di bidang jual beli obat herbal tradional Indonesia.</p>
      </div>

      <!-- Link Cepat -->
      <div>
        <h3 class="text-lg font-semibold mb-2">Link Cepat</h3>
        <ul>
          <li><a href="#" class="hover:underline">Beranda</a></li>
          <li><a href="#" class="hover:underline">Layanan</a></li>
          <li><a href="#" class="hover:underline">Kontak</a></li>
          <li><a href="#" class="hover:underline">Privasi</a></li>
        </ul>
      </div>

      <!-- Sosial Media -->
      <div>
        <h3 class="text-lg font-semibold mb-2">Ikuti Kami</h3>
        <div class="flex justify-center space-x-4 text-2xl">
          <a href="https://www.instagram.com/jamu_kita_umkm/profilecard/?igsh=MThxZWNjaWhsaGttbA==" class="hover:text-yellow-300"><i class="fab fa-instagram"></i></a>
          <a href="#" class="hover:text-yellow-300"><i class="fab fa-facebook"></i></a>
          <a href="#" class="hover:text-yellow-300"><i class="fab fa-tiktok"></i></a>
        </div>
      </div>
    </div>

    <!-- Footer Bawah -->
    <div class="text-center mt-8 text-sm text-gray-200">
      &copy; 2025 Website Anda. Semua Hak Dilindungi.
    </div>
  </div>
</footer>


    
</body>
</html>
