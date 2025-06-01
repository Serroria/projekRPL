<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>JamuKita|Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link rel="stylesheet" href="resources/css/footer.css">
    <link rel="stylesheet" href="resources/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="icon" href="{{ asset('iconLogo.png') }}" type="image/png">
   
    @vite('resources/css/app.css')
    @vite('resources/css/hamburger.css')
    @vite('resources/css/posterSlide.css')
    @vite('resources/css/category.css') 
    @vite('resources/css/cart.css') 
    @vite('resources/css/checkout.css') 
    @vite('resources/css/header.css') 
    @vite('resources/js/category.js')
    @vite('resources/js/hamburger.js')
    @vite('resources/js/posterSlide.js')
    @vite('resources/js/cart.js')
    @vite('resources/js/cart2.js')
    {{-- @vite('resources/js/navbarContent.js') --}}
    @vite('resources/css/sosmed.css')



    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</head>


<body>

  <!---navigation bar--->
  
  @include('partial.navBar')
  <div class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="/js/navBarContent.js"></script>
</div>

<!-- Poster Slider -->
 <div class="container">
@yield('content')
 <div class="img-slider-container">@include('partial.posterSlide')</div>
  
 <!--Kategori-->

@include('partial.category')
 </div>




@yield('mainLayout')


<footer class="bg-[#902727] text-white py-6 mt-12">
  <div class="container mx-auto flex flex-col items-center justify-center">
    <!-- Logo -->
    <img src="{{ asset('iconLogo.png') }}" alt="Logo JamuKita" class="w-12 h-12 mb-4" />

  <!-- Sosial Media -->
  <div>
    <h3 class="text-lg font-semibold mb-2">Ikuti Kami</h3>
    <div class="flex justify-center space-x-4 text-2xl">
      <a href="https://www.instagram.com/jamu_kita_umkm/profilecard/?igsh=MThxZWNjaWhsaGttbA==" class="social-link"><i class="fab fa-instagram"></i></a>
      <a href="https://www.facebook.com/share/198DFtRiUb/" class="social-link"><i class="fab fa-facebook"></i></a>
      <a href="https://www.tiktok.com/@jamu.kita?_t=ZS-8wqRYJ0tg6C&_r=1" class="social-link"><i class="fab fa-tiktok"></i></a>
    </div>
  </div>



    <!-- Footer Bawah -->
    <div class="text-center mt-8 text-sm text-gray-200">
      &copy; 2025 Website Anda. Semua Hak Dilindungi.
    </div>
  </div>
</footer>


<script src="{{ asset('js/category.js') }}"></script>

</body>
</html>
