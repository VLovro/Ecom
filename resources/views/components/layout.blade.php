<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>HoopsShop</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>
<body class="h-full flex flex-col min-h-screen bg-gray-50">

  <nav x-data="{ mobileOpen: false }" class="bg-white border-b overflow-visible">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center">

        <div class="flex-shrink-0">
          <a href="/" class="text-xl font-bold">HoopsShop</a>
        </div>

        <div class="ml-2 lg:hidden">
          <button @click="mobileOpen = !mobileOpen" class="p-2 rounded-md focus:outline-none">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16" />
              <path x-show="mobileOpen"  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="hidden lg:flex lg:flex-1 lg:justify-center">
          <ul class="flex space-x-8">
            {{-- Shoes --}}
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <a href="{{ route('products.index',['group'=>'shoes']) }}"
                 @mouseover="open=true"
                 class="inline-block px-3 py-2 text-gray-700 hover:text-blue-600">
                Shoes
              </a>
              <ul x-show="open" x-transition class="absolute z-50 top-full w-40 bg-white border rounded shadow">
                <li>
                  <a href="{{ route('products.index',['group'=>'shoes','category'=>'Basketball Shoes']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Basketball Shoes
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'shoes','category'=>'Lifestyle Shoes']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Lifestyle Shoes
                  </a>
                </li>
              </ul>
            </li>

            {{-- Accessories --}}
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <a href="{{ route('products.index',['group'=>'accessories']) }}"
                 @mouseover="open=true"
                 class="inline-block px-3 py-2 text-gray-700 hover:text-blue-600">
                Accessories
              </a>
              <ul x-show="open" x-transition class="absolute z-50 top-full w-40 bg-white border rounded shadow">
                <li>
                  <a href="{{ route('products.index',['group'=>'accessories','category'=>'Basketballs']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Basketballs
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'accessories','category'=>'Bags & Backpacks']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Bags &amp; Backpacks
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'accessories','category'=>'Socks']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Socks
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'accessories','category'=>'Headbands']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Headbands
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'accessories','category'=>'Hats']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Hats
                  </a>
                </li>
              </ul>
            </li>

            {{-- Apparel --}}
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <a href="{{ route('products.index',['group'=>'apparel']) }}"
                 @mouseover="open=true"
                 class="inline-block px-3 py-2 text-gray-700 hover:text-blue-600">
                Apparel
              </a>
              <ul x-show="open" x-transition class="absolute z-50 top-full w-48 bg-white border rounded shadow">
                <li>
                  <a href="{{ route('products.index',['group'=>'apparel','category'=>'T‑shirts']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    T-shirts
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'apparel','category'=>'Hoodies & Sweatshirts']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Hoodies &amp; Sweatshirts
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'apparel','category'=>'Shorts']) }}"
                     @click="open=false"
                     class="block px-3 py-2 rounded hover:bg-gray-100">
                    Shorts
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'apparel','category'=>'Jerseys']) }}"
                     @click="open=false"
                     class="block px-3 py-2 rounded hover:bg-gray-100">
                    Jerseys
                  </a>
                </li>
              </ul>
            </li>

            {{-- Collectibles --}}
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <a href="{{ route('products.index',['group'=>'collectibles']) }}"
                 @mouseover="open=true"
                 class="inline-block px-3 py-2 text-gray-700 hover:text-blue-600">
                Collectibles
              </a>
              <ul x-show="open" x-transition class="absolute z-50 top-full w-40 bg-white border rounded shadow">
                <li>
                  <a href="{{ route('products.index',['group'=>'collectibles','category'=>'Art']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Art
                  </a>
                </li>
                <li>
                  <a href="{{ route('products.index',['group'=>'collectibles','category'=>'Figures']) }}"
                     @click="open=false"
                     class="block px-4 py-2 hover:bg-gray-100">
                    Figures
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>

        
        <div class="flex items-center ml-auto lg:flex lg:items-center lg:space-x-6">
          <div class="relative" x-data="{ open: false }" @mouseleave="open=false">
        
            <button @click="open=!open" class="px-3 py-2 text-gray-700 hover:text-blue-600 flex items-center justify-center">
      
                <img src="{{ asset('images/profile2.svg') }}" alt="Profile" class="h-6 w-6">
            </button>
            <ul x-show="open" x-transition class="absolute z-50 right-0 top-full w-40 bg-white border rounded shadow">
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">My Wishlist</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a></li>
            </ul>
          </div>


          <a href="{{ route('cart.index') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 relative flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
              </svg>


              @if(Cart::instance('cart')->content()->count() > 0)
                  <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full px-1.5 py-0.5">
                      {{ Cart::instance('cart')->content()->count() }}
                  </span>
              @endif
          </a>
        </div>
      </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="mobileOpen" x-transition class="lg:hidden border-t">
      <ul class="space-y-1 px-2 py-3">
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Shoes
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li>
              <a href="{{ route('products.index',['group'=>'shoes','category'=>'Basketball Shoes']) }}"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Basketball Shoes
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'shoes','category'=>'Lifestyle Shoes']) }}"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Lifestyle Shoes
              </a>
            </li>
          </ul>
        </li>
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Accessories
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li>
              <a href="{{ route('products.index',['group'=>'accessories','category'=>'Basketballs']) }}"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Basketballs
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'accessories','category'=>'Bags & Backpacks']) }}"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Bags &amp; Backpacks
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'accessories','category'=>'Socks']) }}"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Socks
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'accessories','category'=>'Headbands']) }}"
                 @click="open=false"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Headbands
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'accessories','category'=>'Hats']) }}"
                 @click="open=false"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Hats
              </a>
            </li>
          </ul>
        </li>
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Apparel
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li>
              <a href="{{ route('products.index',['group'=>'apparel','category'=>'T‑shirts']) }}"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                T-shirts
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'apparel','category'=>'Hoodies & Sweatshirts']) }}"
                 @click="open=false"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Hoodies &amp; Sweatshirts
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'apparel','category'=>'Shorts']) }}"
                 @click="open=false"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Shorts
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'apparel','category'=>'Jerseys']) }}"
                 @click="open=false"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Jerseys
              </a>
            </li>
          </ul>
        </li>
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Collectibles
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li>
              <a href="{{ route('products.index',['group'=>'collectibles','category'=>'Art']) }}"
                 @click="open=false"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Art
              </a>
            </li>
            <li>
              <a href="{{ route('products.index',['group'=>'collectibles','category'=>'Figures']) }}"
                 @click="open=false"
                 class="block px-3 py-2 rounded hover:bg-gray-100">
                Figures
              </a>
            </li>
          </ul>
        </li>
       

      </ul>
    </div>
  </nav>

  <main class="container mx-auto py-4 flex-grow">
    {{ $slot }}
  </main>

  <footer class="bg-gray-800 text-gray-200 pt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">

      <div>
        <h4 class="font-semibold mb-4">Customer Service</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">Help Center</a></li>
          <li><a href="#" class="hover:text-white">Shipping & Returns</a></li>
          <li><a href="#" class="hover:text-white">Track Order</a></li>
          <li><a href="#" class="hover:text-white">Contact Us</a></li>
        </ul>
      </div>

      <div>
        <h4 class="font-semibold mb-4">Company</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">About Us</a></li>
          <li><a href="#" class="hover:text-white">Careers</a></li>

        </ul>
      </div>

      <div>
        <h4 class="font-semibold mb-4">Legal</h4>
        <ul class="space-y-2 text-sm mb-4">
          <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
          <li><a href="#" class="hover:text-white">Terms of Service</a></li>
          <li><a href="#" class="hover:text-white">Cookie Settings</a></li>
        </ul>
        <div class="flex space-x-2">
          <img src="{{ asset('/images/payments/visa.svg') }}" alt="Visa" class="h-6"/>
          <img src="{{ asset('/images/payments/mastercard.svg') }}" alt="Mastercard" class="h-6"/>
          <img src="{{ asset('/images/payments/paypal.svg') }}" alt="PayPal" class="h-6"/>
        </div>
      </div>

      <div>
        <h4 class="font-semibold mb-4">Stay in Touch</h4>
        <form class="flex mb-4">
          <input type="email" placeholder="Your email"
                 class="w-full px-3 py-2 rounded-l bg-gray-700 text-sm focus:outline-none"/>
          <button type="submit" class="px-4 bg-indigo-600 rounded-r text-white text-sm">Subscribe</button>
        </form>
        <div class="flex space-x-4">
          <a href="#" aria-label="Facebook" class="hover:text-white">📘</a>
          <a href="#" aria-label="Instagram" class="hover:text-white">📸</a>
          <a href="#" aria-label="Twitter" class="hover:text-white">🐦</a>
          <a href="#" aria-label="YouTube" class="hover:text-white">▶️</a>
        </div>
      </div>

    </div>

    <div class="mt-8 border-t border-gray-700 pt-6 text-center text-xs text-gray-500">
      &copy; 2025 HoopsShop. All rights reserved.
    </div>
  </footer>
</body>
</html>
