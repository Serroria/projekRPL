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
</div>

<div class= bg-[#f9f6ee] >
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>

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
            <p><strong>Harga:</strong> Rp. {{ number_format($product->harga, 2, ',', '.') }}</p>
          <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded" 
            onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
            BELI
          </button>
        </div>
          @endforeach
      </div>

    <!-- <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
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
            <ul class="list-disc list-inside space-y-2">
              <li>Khasiat: <br>
                Membantu meredakan pegal, membantu meredakan perut kembung dan membantu menghangatkan badan.</li>
              <li>Saran Penyajian: <br>
                1 bungkus diseduh dengan ± 150 ml (3/4 gelas) air panas/dingin.</li>
              <li>1 Box isi 5 sachet 25 gram</li>
              <li>Baik diminum pria dan wanita, tua/muda, dan anak-anak.</li>
            </ul>
          </div>

          <h3 class="mt-2 text-sm text-gray-700">'Minuman Herbal'</h3>
          <p class="mt-1 text-lg font-medium text-gray-900">Rp. 8.500,00</p>

          <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded" 
            onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
            BELI
          </button>
        </div>
      </div> -->

      <!-- <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
       -->
      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuAnak">
            <div class="group block">
              <img src="buyungupik2.png" alt="Buyung Upik" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('buyungupik')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Buyung Upik
                  <span id="arrowIcon-buyungupik" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-buyungupik" class="hidden mt-2 text-sm text-gray-600">
                  <ul class="list-disc list-inside space-y-2">
                    <li>Khasiat: <br>
                      Memelihara kesehatan, membantu memperbaiki nafsu makan dan secara tradisional digunakan pada penderita cacingan</li>
                    <li>Saran Penyajian: <br>
                      Dapat dimakan langsung atau diseduh dengan 3 - 5 sendok makan air matang panas/dingin, 2 - 3 kali sehari. <br>
                      (Anak umur 3 - 6 : 1/2 bungkus) <br>
                      (Anak umur 7 - 12 tahun : 1 bungkus)</li>
                    <li>1 Box isi 11 sachet 200 gram</li>
                  </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli
              <h3 class="mt-2 text-sm text-gray-700">'Jamu Anak'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 10.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="minumanHerbal">
            <div class="group block">
              <img src="sari-temulawak.png" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('saritemulawak')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Sari Temulawak
                  <span id="arrowIcon-saritemulawak" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-saritemulawak" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Membantu memelihara kesehatan fungsi hati.</li>
                  <li>Saran Penyajian: <br>
                    3 x 1 kapsul sehari atau sesuai petunjuk dokter.</li>
                  <li>1 botol isi 30 kapsul.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Minuman Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 85.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/davidnicolas4?categoryId=100001&entryPoint=ShopByPDP&itemId=43550536931';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="encok.png" alt="Jamu Temulawak" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('encok')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Encok
                  <span id="arrowIcon-encok" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>  -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-encok" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Membantu meredakan nyeri akibat encok pegal linu dan nyeri pada persendian.</li>
                  <li>Saran Penyajian: <br>
                    2 x sehari @ 1 bungkus selama 3 hari, selanjutnya tiap hari sebungkus sampai sembuh. 1 bungkus diseduh dengan 100 cc (± ½ gelas) air panas.</li>
                  <li>Per sachet @ 7 gram</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-ENCOK-Sido-Muncul-i.217988839.40650755375';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamu-bersalin.png') }}" alt="Jamu Bersalin" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('bersalin')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Bersalin
                  <span id="arrowIcon-bersalin" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-bersalin" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Untuk wanita sehabis melahirkan. Secara tradisional membantu sirkulasi darah. Membantu memperbaiki nafsu makan dan membantu melancarkan air susu ibu (ASI) serta membantu menyegarkan badan.</li>
                  <li>Saran Penyajian: <br>
                    Diminum 2 x sehari @ 1 bungkus, mulai hari ke 11 sampai hari ke 40 sehabis melahirkan. 1 bungkus diseduh dengan 100 cc (±½ gelas) air panas. <br>
                    Untuk selanjutnya minum jamu Galian Parem</li>
                  <li>Per sachet @ 7 gram</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-BERSALIN-Sido-Muncul-i.217988839.43250749369';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamu-klingsir.png') }}" alt="Jamu Klingsir" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('klingsir')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Klingsir
                  <span id="arrowIcon-klingsir" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-klingsir" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Membantu meredakan sakit otot pinggang dan membantu melancarkan buang air kecil.</li>
                  <li>Saran Penyajian: <br>
                    Setiap 2-3 hari sekali 1 bungkus, bila perlu setiap hari 1 bungkus. <br>
                    1 bungkus diseduh dengan 100 cc (± ½ gelas) air panas.</li>
                  <li>Per sachet @ 7 gram</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal</li>
                  <li>Bila tidak ada perbaikan gejala segera hubungi dokter</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KLINGSIR-Sido-Muncul-i.217988839.41700776478';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamu-gemuk-sehat.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('gemuk')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Gemuk Sehat
                  <span id="arrowIcon-gemuk" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-gemuk" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Secara tradisional membantu memperbaiki nafsu makan.</li>
                  <li>Saran Penyajian: <br>
                    Diminum 1-2 x sehari @ 1 bungkus sebelum makan, terutama malam hari. <br>
                    1 bungkus diseduh dengan 100 cc (± ½ gelas) air panas. <br>
                    Dapat ditambah sedikit garam, air jeruk nipis dan madu. <br>
                    Minum teratur selama 2 bulan.</li>
                  <li>Per sachet @ 7 gram</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GEMUK-SEHAT-Sido-Muncul-i.217988839.40800771846';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('galian-delima-putih.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('delimaputih')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Galian Delima Putih
                  <span id="arrowIcon-delimaputih" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-delimaputih" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Secara tradisional membantu mengurangi lendir yang berlebihan pada daerah kewanitaan.</li>
                  <li>Saran Penyajian: <br>
                    1-2 x sehari @ 1 bungkus sesuai kebutuhan. 1 bungkus diseduh dengan 100 cc (± ½ gelas) air panas.</li>
                  <li>Per sachet @ 7 gram</li>
                  <li>Konsultasikan ke dokter apabila lendir tidak berkurang atau berbau atau berwarna kuning atau berdarah.</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GALIAN-DELIMA-PUTIH-Sido-Muncul-i.217988839.43850750470';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('galian-parem.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('galianparem')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Galian Parem
                  <span id="arrowIcon-galianparem" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>  -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-galianparem" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Secara tradisional membantu memelihara kesehatan ibu sehabis bersalin, melancarkan air susu ibu (ASI) dan membantu menyegarkan badan.</li>
                  <li>Saran Penyajian: <br>
                    Diminum 2 x sehari @ 1 bungkus, mulai hari ke 40 setelah melahirkan. <br>
                    1 bungkus diseduh dengan 100 cc (±½ gelas) air panas.</li>
                  <li>Per sachet @ 7 gram</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 4.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GALIAN-PAREM-Sido-Muncul-i.217988839.41650771917';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('galian-singset.png') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('galiansingset')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Galian Singset
                  <span id="arrowIcon-galiansingset" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-galiansingset" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Secara tradisional dapat membantu mengurangi lemak tubuh.</li>
                  <li>Saran Penyajian: <br>
                    1-2 x sehari @ 1 bungkus selama 30 hari, untuk selanjutnya tiap 2 hari 1 bungkus. <br>
                    1 bungkus diseduh dengan 100 cc (± ½ gelas) air panas.</li>
                  <li>Per sachet @ 7 gram</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-GALIAN-SINGSET-Sido-Muncul-i.217988839.40600786041';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('komplitgalianmontok')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Galian Montok
                  <span id="arrowIcon-komplitgalianmontok" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-komplitgalianmontok" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Membantu memperbaiki nafsu makan, menyegarkan badan, dan memelihara daya tahan tubuh.</li>
                  <li>Saran Penyajian: <br>
                    - 1 sachet Jamu Sido Muncul diseduh dengan ±100 ml air panas <br>
                    - Kemudian masukkan Beras Kencur, Madu Sido Original, aduk dan minum selagi hangat <br>
                    - Kemudian minum Pil Ginseng untuk membantu memelihara daya tahan tubuh <br>
                    - Sebagai penawar rasa, minum Jahe Wangi yang telah diseduh dengan ± 50 ml air panas</li>
                  <li>Tiap paket Jamu Komplit Galian Montok terdiri dari: <br>
                      - 1 sachet Jamu Sido Muncul Galian Montok <br>
                      - 1 sachet Beras Kencur <br>
                      - 1 sachet Madu Sido Original <br>
                      - 1 sachet Pil Ginseng Sido Muncul <br>
                      - 1 sachet Jahe Wangi</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-GALIAN-MONTOK-Sido-Muncul-i.217988839.43150772137';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('komplitgemuksehat')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Gemuk Sehat
                  <span id="arrowIcon-komplitgemuksehat" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-komplitgemuksehat" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Secara tradisional dapat membantu memperbaiki nafsu makan dan memelihara daya tahan tubuh.</li>
                  <li>Saran Penyajian: <br>
                    - 1 sachet Jamu Sido Muncul diseduh dengan ±100 ml air panas. <br>
                    - Kemudian masukkan Beras Kencur, Madu Sido Original, aduk dan minum selagi hangat. <br>
                    - Kemudian minum Pil Ginseng untuk membantu memelihara daya tahan tubuh. <br>
                    - Sebagai penawar rasa, minum Jahe Wangi yang telah diseduh dengan ± 50 ml air panas</li>
                  <li>Tiap paket Jamu Komplit Gemuk Sehat terdiri dari: <br>
                      - 1 sachet Jamu Sido Muncul Gemuk Sehat <br>
                      - 1 sachet Beras Kencur <br>
                      - 1 sachet Madu Sido Original <br>
                      - 1 sachet Pil Ginseng Sido Muncul <br>
                      - 1 sachet Jahe Wangi</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-GEMUK-SEHAT-Sido-Muncul-i.217988839.40350777084';">
                BELI
              </button>
            </div>
      </div> -->
<!-- 
      <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('kukubima')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Kuku Bima
                  <span id="arrowIcon-kukubima" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-kukubima" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Membantu meredakan sakit otot pinggang, memelihara daya tahan tubuh dan kesehatan pria.</li>
                  <li>Saran Penyajian: <br>
                    - 1 sachet Jamu Sido Muncul diseduh dengan ±100 ml air panas <br>
                    - Kemudian masukkan Beras Kencur, Madu Jeruk Nipis, aduk dan minum selagi hangat <br>
                    - Kemudian minum Pil Ginseng untuk membantu memelihara daya tahan tubuh <br>
                    - Sebagai penawar rasa, minum Jahe Wangi yang telah diseduh dengan ± 50 ml air panas</li>
                  <li>Tiap paket Jamu Komplit Jeruk Nipis Kuku Bima terdiri dari: <br>
                      - 1 sachet Jamu Sido Muncul Kuku Bima <br>
                      - 1 sachet Beras Kencur <br>
                      - 1 sachet Madu Jeruk Nipis <br>
                      - 1 sachet Pil Ginseng Sido Muncul <br>
                      - 1 sachet Jahe Wangi</li>
                  <li>Hati-hati pada penderita kardiovaskular atau diabetes mellitus serta gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 3.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-KUKU-BIMA-Sido-Muncul-i.217988839.26936614354';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('kukubima-TL')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Kuku Bima TL
                  <span id="arrowIcon-kukubima-TL" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-kukubima-TL" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Membantu memelihara stamina dan membantu meredakan pegal linu dan sakit otot pinggang.</li>
                  <li>Saran Penyajian: <br>
                    - 1 sachet Jamu Sido Muncul diseduh dengan ±100 ml air panas <br>
                    - Kemudian masukkan Beras Kencur, Madu Jeruk Nipis, aduk dan minum selagi hangat <br>
                    - Kemudian minum Pil Ginseng untuk membantu memelihara daya tahan tubuh <br>
                    - Sebagai penawar rasa, minum Jahe Wangi yang telah diseduh dengan ± 50 ml air panas</li>
                  <li>Tiap paket Jamu Komplit Jeruk Nipis Kuku Bima TL terdiri dari: <br>
                      - 1 sachet Jamu Sido Muncul Kuku Bima TL <br>
                      - 1 sachet Beras Kencur <br>
                      - 1 sachet Madu Jeruk Nipis <br>
                      - 1 sachet Pil Ginseng Sido Muncul <br>
                      - 1 sachet Jahe Wangi</li>
                  <li>Hati-hati pada penderita kardiovaskular, hipertensi atau diabetes mellitus serta penderita gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 3.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-KUKU-BIMA-TL-Sido-Muncul-i.217988839.40301040554';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8"> -->

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('GM-jeruknipis')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Galian Montok
                  <span id="arrowIcon-GM-jeruknipis" class="ml-2 transition-transform">▼</span>
                </h3>
              </div> -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-GM-jeruknipis" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Membantu memperbaiki nafsu makan, menyegarkan badan, dan memelihara daya tahan tubuh.</li>
                  <li>Saran Penyajian: <br>
                    - 1 sachet Jamu Sido Muncul diseduh dengan ±100 ml air panas <br>
                    - Kemudian masukkan Beras Kencur, Madu Jeruk Nipis, aduk dan minum selagi hangat <br>
                    - Kemudian minum Pil Ginseng untuk membantu memelihara daya tahan tubuh <br>
                    - Sebagai penawar rasa, minum Jahe Wangi yang telah diseduh dengan ± 50 ml air panas</li>
                  <li>Tiap paket Jamu Komplit Jeruk Nipis Galian Montok terdiri dari: <br>
                      - 1 sachet Jamu Sido Muncul Galian Montok <br>
                      - 1 sachet Beras Kencur <br>
                      - 1 sachet Madu Jeruk Nipis <br>
                      - 1 sachet Pil Ginseng Sido Muncul <br>
                      - 1 sachet Jahe Wangi</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 2.500,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-GALIAN-MONTOK-Sido-Muncul-i.217988839.42450782225';">
                BELI
              </button>
            </div>
      </div> -->

      <!-- <div class="max-w-sm mx-auto product-card" data-category="jamuHerbal">
            <div class="group block">
              <img src="{{ asset('jamukita.jpg') }}" alt="Jamu Gemuk Sehat" class="aspect-square w-full rounded-lg bg-gray-200 object-cover group-hover:opacity-75 xl:aspect-7/8">

              <!-- Judul + Toggle Panah -->
              <!-- <div class="flex items-center justify-between mt-4 cursor-pointer" onclick="toggleDesc('GS-jeruknipis')">
                <h3 class="text-sm text-gray-700 font-semibold flex items-center">
                  Jamu Komplit Jeruk Nipis Gemuk Sehat
                  <span id="arrowIcon-GS-jeruknipis" class="ml-2 transition-transform">▼</span>
                </h3>
              </div>  -->

              <!-- Deskripsi yang bisa ditoggle -->
              <!-- <div id="descBox-GS-jeruknipis" class="hidden mt-2 text-sm text-gray-600">
                <ul class="list-disc list-inside space-y-2">
                  <li>Khasiat: <br>
                    Secara tradisional dapat membantu memperbaiki nafsu makan dan memelihara daya tahan tubuh.</li>
                  <li>Saran Penyajian: <br>
                    - 1 sachet Jamu Sido Muncul diseduh dengan ±100 ml air panas <br>
                    - Kemudian masukkan Beras Kencur, Madu Jeruk Nipis, aduk dan minum selagi hangat <br>
                    - Kemudian minum Pil Ginseng untuk membantu memelihara daya tahan tubuh <br>
                    - Sebagai penawar rasa, minum Jahe Wangi yang telah diseduh dengan ± 50 ml air panas</li>
                  <li>Tiap paket Jamu Komplit Jeruk Nipis Gemuk Sehat terdiri dari: <br>
                      - 1 sachet Jamu Sido Muncul Gemuk Sehat <br>
                      - 1 sachet Beras Kencur <br>
                      - 1 sachet Madu Jeruk Nipis <br>
                      - 1 sachet Pil Ginseng Sido Muncul <br>
                      - 1 sachet Jahe Wangi</li>
                  <li>Tidak direkomendasikan untuk wanita hamil dan menyusui serta penderita gangguan ginjal.</li>
                </ul>
              </div> -->

              <!-- Kategori, Harga, Tombol Beli -->
              <!-- <h3 class="mt-2 text-sm text-gray-700">'Jamu Herbal'</h3>
              <p class="mt-1 text-lg font-medium text-gray-900">Rp. 3.000,00</p>
              <button class="mt-2 bg-orange-950 hover:bg-red-700 text-white font-bold py-2 px-4 border rounded"
                onclick="location.href='https://shopee.co.id/JAMU-KOMPLIT-JERUK-NIPIS-GEMUK-SEHAT-Sido-Muncul-i.217988839.43350777018';">
                BELI
              </button>
            </div>
      </div> -->

      


      

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