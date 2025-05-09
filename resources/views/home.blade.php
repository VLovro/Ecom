<x-layout heading="Home Page">
    <div class="bg-gray-100">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
          <h2 class="text-2xl font-bold text-gray-900">Shop by Category</h2>
  
          <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
  
            <!-- Card 1: Shoes -->
            <div class="group relative">
              <div class="w-full aspect-square overflow-hidden rounded-lg bg-white">
                <img
                  src="{{ asset('images/patike.jpg') }}"
                  alt="Basketball shoes"
                  class="w-full h-full object-cover group-hover:opacity-75"
                />
              </div>
              <h3 class="mt-6 text-sm text-gray-500">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  Shoes
                </a>
              </h3>
              <p class="text-base font-semibold text-gray-900">
                Explore lifestyle and basketball shoes
              </p>
            </div>
  
            <!-- Card 2: Collectibles -->
            <div class="group relative">
              <div class="w-full aspect-square overflow-hidden rounded-lg bg-white">
                <img
                  src="{{ asset('images/cards.jpg') }}"
                  alt="Collectibles"
                  class="w-full h-full object-cover group-hover:opacity-75"
                />
              </div>
              <h3 class="mt-6 text-sm text-gray-500">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  Collectibles
                </a>
              </h3>
              <p class="text-base font-semibold text-gray-900">
                Memorabilia & trading cards
              </p>
            </div>
  
            <!-- Card 3: Accessories -->
            <div class="group relative">
              <div class="w-full aspect-square overflow-hidden rounded-lg bg-white">
                <img
                  src="{{ asset('images/acessories.jpg') }}"
                  alt="Accessories"
                  class="w-full h-full object-cover group-hover:opacity-75"
                />
              </div>
              <h3 class="mt-6 text-sm text-gray-500">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  Accessories
                </a>
              </h3>
              <p class="text-base font-semibold text-gray-900">
                Explore various accessories
              </p>
            </div>
  
            <!-- Card 4: Apparel -->
            <div class="group relative">
              <div class="w-full aspect-square overflow-hidden rounded-lg bg-white">
                <img
                  src="{{ asset('images/timovi.png') }}"
                  alt="Apparel"
                  class="w-full h-full object-cover group-hover:opacity-75"
                />
              </div>
              <h3 class="mt-6 text-sm text-gray-500">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  Apparel
                </a>
              </h3>
              <p class="text-base font-semibold text-gray-900">
                Shop team apparel
              </p>
            </div>
  
          </div>
        </div>
      </div>
    </div>
  </x-layout>
  