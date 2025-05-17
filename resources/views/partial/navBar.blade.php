<header class="sticky top-0 z-50 bg-[#902727] shadow-md">

    <nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8" x-data="{ isOpen: false }">
      <div class="border-b border-gray-200">
        <div class="flex h-16 items-center">
          <!-- Mobile menu toggle, controls the 'mobileMenuOpen' state. -->
          <!-- <button class="relative rounded-md bg-[#902727] p-2 text-white lg:hidden">
            <span  class="absolute -inset-0.5"></span>
            <span class="sr-only">Open menu</span>
            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
          </button> -->

          <!-- Logo -->
          <div class="ml-4 flex lg:ml-0">
            <a href="#">
              <span class="sr-only">JamuKita</span>
              <img class="h-8 w-auto" src="jamukita.jpg" alt="">
            </a>
          </div>

          <!-- Flyout menus -->
          <div x-data="{ isOpen: false }" class="hidden lg:ml-8 lg:block lg:self-stretch">
            <div class="flex h-full space-x-8">
              <div class="flex">
                <div  class="relative flex">
                  <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
                  <button type="button" @click="isOpen = !isOpen" class="relative z-10 -mb-px flex items-center border-b-2 border-transparent pt-px text-sm font-medium text-white transition-colors duration-200 ease-out hover:text-gray" aria-expanded="false">Category</button>
                    
                </div>

                <!--
                  'Women' flyout menu, show/hide based on flyout menu state.

                  Entering: "transition ease-out duration-200"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "transition ease-in duration-150"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div  x-show="isOpen"
                  x-transition:enter="transition ease-out duration-200 transform"
                  x-transition:enter-start="opacity-0 scale-95"
                  x-transition:enter-end="opacity-100 scale-100"
                  x-transition:leave="transition ease-in duration-150 transform"
                  x-transition:leave-start="opacity-100 scale-100"
                  x-transition:leave-end="opacity-0 scale-95" 
                  class="absolute inset-x-0 top-full text-sm text-gray-500">
                  <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                  <div class="absolute inset-0 top-1/2 bg-white shadow-sm" aria-hidden="true"></div>

                  <div class="relative bg-white">
                    <div class="mx-auto max-w-7xl px-8">
                      <div class="grid grid-cols-2 gap-x-8 gap-y-10 py-16">
                        <div class="col-start-2 grid grid-cols-2 gap-x-8">
                          <div class="group relative text-base sm:text-sm">
                            <img src="buyungupik.jpg" alt="Models sitting back to back, wearing Basic Tee in black and bone." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                              New Arrivals
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                          </div>
                          <div class="group relative text-base sm:text-sm">
                            <img src="jamu-galian-montok.png" alt="Close up of Basic Tee fall bundle with off-white, ochre, olive, and black tees." class="aspect-square w-full rounded-lg bg-gray-100 object-cover group-hover:opacity-75">
                            <a href="#" class="mt-6 block font-medium text-gray-900">
                              <span class="absolute inset-0 z-10" aria-hidden="true"></span>
                              New Arrivals
                            </a>
                            <p aria-hidden="true" class="mt-1">Shop now</p>
                          </div>
                        </div>
                        <div class="row-start-1 grid grid-cols-3 gap-x-8 gap-y-10 text-sm">
                          <div>
                            <p id="Clothing-heading" class="font-medium text-gray-900">Minuman Herbal</p>
                            <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Wedang Jahe</a>
                              </li>
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Kunyit Asam</a>
                              </li>
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Wedang Uwuh</a>
                              </li>
                            </ul>
                          </div>
                          <div>
                            <p id="Accessories-heading" class="font-medium text-gray-900">Jamu Anak</p>
                            <ul role="list" aria-labelledby="Accessories-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Buyung Upik</a>
                              </li>
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Beras Kencur</a>
                              </li>
                            </ul>
                          </div>
                          <div>
                            <p id="Brands-heading" class="font-medium text-gray-900">Obat Herbal</p>
                            <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Jahe</a>
                              </li>
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Temulawak</a>
                              </li>
                              <li class="flex">
                                <a href="#" class="hover:text-gray-800">Kunyit</a>
                              </li>
                            
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            
              <a href="{{ route('company') }}" class="flex items-center text-sm font-medium text-white hover:text-gray">Company</a>
              <a href="#" class="flex items-center text-sm font-medium text-white hover:text-gray">Stores</a>
            </div>
          </div>

          <div class="ml-auto flex items-center">
            <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
              <!-- <a href="#" class="text-sm font-medium text-white hover:text-gray">Sign in</a> -->
              <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
              <!-- <a href="#" class="text-sm font-medium text-white hover:text-gray">Create account</a> -->
            </div>
<!--Search-->
            
            <div class="flex lg:ml-6">
              <a href="#" class="p-2 text-white hover:text-gray">
                <!-- <span class="sr-only">Search</span> -->
                <!-- <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
              </a>
            </div>

          
  <!-- Cart -->
            <div class="ml-4 flow-root lg:ml-6">
              <a href="#" class="group -m-2 flex items-center p-2">
                <svg class="size-6 shrink-0 text-white grup-hover:text-gray" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
                <span class="ml-2 text-sm font-medium text-white grup-hover:text-gray">0</span>
                <span class="sr-only">items in cart, view bag</span>
              </a>
            </div> -->
          </div>
        </div>
      </div>
    

    </nav>
  </header>