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
      <div class="max-w-sm mx-auto product-card" data-category="minumanHerbal">
        <div class="group block">
          <img src="kencurberas.png" alt="Beras Kencur" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">
          
          <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('beraskencur')">
            <h3 class="text-sm text-gray-700 font-semibold flex items-center">
              Beras Kencur
              <span id="arrowIcon-beraskencur" class="ml-2 transition-transform">▼</span>
            </h3>
          </div>

          <div id="descBox-beraskencur" class="hidden mt-2 text-sm text-gray-600">
            Minuman herbal tradisional yang terbuat dari beras dan kencur. Menyegarkan dan baik untuk kesehatan tubuh.
          </div>

          <h3 class="mt-2 text-sm text-gray-700">'Minuman Herbal'</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">Rp. 8.500,00</p>

          <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded" 
            onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
            BELI
          </button>
        </div>
      </div>
      
      <div class="max-w-sm mx-auto product-card" data-category="jamuAnak">
            <div class="group block">
              <img src="buyungupik2.png" alt="Buyung Upik" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('buyungupik')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Buyung Upik
                  <span id="arrowIcon-buyungupik" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-buyungupik" class="hidden mt-2 text-sm text-gray-600">
                Jamu anak tradisional yang membantu menjaga kesehatan dan nafsu makan anak. Buyung Upik mengandung ekstrak beberapa bahan alami seperti temulawak, lempuyang wangi, kulit kayu manis, kunyit, jahe, kencur, daun sereh, dan daun pandan. 
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Anak'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 7.600,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="minumanHerbal">
            <div class="group block">
              <img src="sari-temulawak.png" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('saritemulawak')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Sari Temulawak
                  <span id="arrowIcon-saritemulawak" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-saritemulawak" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Sari Temulawak
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Minuman Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 85.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="encok.png" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('encok')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Encok
                  <span id="arrowIcon-encok" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-encok" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Encok
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-ENCOK-Sido-Muncul-i.217988839.40650755375';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamu-bersalin.png') }}" alt="Jamu Bersalin" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('bersalin')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Bersalin
                  <span id="arrowIcon-bersalin" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-bersalin" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Bersalin
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-BERSALIN-Sido-Muncul-i.217988839.43250749369';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamu-klingsir.png') }}" alt="Jamu Klingsir" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('klingsir')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Klingsir
                  <span id="arrowIcon-klingsir" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-klingsir" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Klingsir
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KLINGSIR-Sido-Muncul-i.217988839.41700776478';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamu-gemuk-sehat.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('gemuk')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Gemuk Sehat
                  <span id="arrowIcon-gemuk" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-gemuk" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Gemuk Sehat
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GEMUK-SEHAT-Sido-Muncul-i.217988839.40800771846';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('galian-delima-putih.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('delimaputih')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Galian Delima Putih
                  <span id="arrowIcon-delimaputih" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-delimaputih" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Galian Delima Putih
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GALIAN-DELIMA-PUTIH-Sido-Muncul-i.217988839.43850750470';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('galian-parem.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('galianparem')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Galian Parem
                  <span id="arrowIcon-galianparem" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-galianparem" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Galian Parem
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 4.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GALIAN-PAREM-Sido-Muncul-i.217988839.41650771917';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('galian-singset.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('galiansingset')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Galian Singset
                  <span id="arrowIcon-galiansingset" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-galiansingset" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Galian Singset
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GALIAN-SINGSET-Sido-Muncul-i.217988839.40600786041';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('komplitgalianmontok')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Galian Montok
                  <span id="arrowIcon-komplitgalianmontok" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-komplitgalianmontok" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Komplit Galian Montok
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-GALIAN-MONTOK-Sido-Muncul-i.217988839.43150772137';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('komplitgemuksehat')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Gemuk Sehat
                  <span id="arrowIcon-komplitgemuksehat" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-komplitgemuksehat" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Komplit Gemuk Sehat
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-GEMUK-SEHAT-Sido-Muncul-i.217988839.40350777084';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('kukubima')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Kuku Bima
                  <span id="arrowIcon-kukubima" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-kukubima" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Komplit Jeruk Nipis Kuku Bima
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 3.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-KUKU-BIMA-Sido-Muncul-i.217988839.26936614354';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('kukubima-TL')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Kuku Bima TL
                  <span id="arrowIcon-kukubima-TL" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-kukubima-TL" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Komplit Jeruk Nipis Kuku Bima TL
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 3.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-KUKU-BIMA-TL-Sido-Muncul-i.217988839.40301040554';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('GM-jeruknipis')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Galian Montok
                  <span id="arrowIcon-GM-jeruknipis" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-GM-jeruknipis" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Komplit Jeruk Nipis Galian Montok
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-GALIAN-MONTOK-Sido-Muncul-i.217988839.42450782225';">
                BELI
              </button>
            </div>
      </div>

      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('GS-jeruknipis')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Gemuk Sehat
                  <span id="arrowIcon-GS-jeruknipis" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>

              <!-- Deskripsi yang bisa ditoggle -->
              <div id="descBox-GS-jeruknipis" class="hidden mt-2 text-sm text-gray-600">
                Deskripsi Jamu Komplit Jeruk Nipis Gemuk Sehat
              </div>

              <!-- Kategori, Harga, Tombol Beli -->
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 3.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-GEMUK-SEHAT-Sido-Muncul-i.217988839.43350777018';">
                BELI
              </button>
            </div>
      </div>



      

      <!-- More products... -->
    </div>

      <script>
        function toggleDesc(id) {
          const desc = document.getElementById(`descBox-${id}`);
          const arrow = document.getElementById(`arrowIcon-${id}`);
          desc.classList.toggle("hidden");
          arrow.textContent = desc.classList.contains("hidden") ? "▼" : "▲";
        }
      </script>
    </div>
  </div>
</div>

@endsection