<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Alpine.js for dropdowns & mobile toggle -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  
  <title>HoopsShop</title>
</head>
<body class="h-full">

  <!-- NAVBAR -->
  <nav x-data="{ mobileOpen: false }" class="bg-white border-b">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center">
  
        <!-- Brand -->
        <div class="flex-shrink-0">
          <a href="#" class="text-xl font-bold">HoopsShop</a>
        </div>
  
        <!-- Mobile toggle -->
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
  
        <!-- Desktop main nav (centered) -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-center">
          <ul class="flex space-x-8">
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <button @mouseover="open=true" @click="open=!open"
                      class="px-3 py-2 text-gray-700 hover:text-blue-600">Shoes</button>
              <ul x-show="open" x-transition class="absolute mt-2 w-40 bg-white border rounded shadow">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Basketball</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Lifestyle</a></li>
              </ul>
            </li>
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <button @mouseover="open=true" @click="open=!open"
                      class="px-3 py-2 text-gray-700 hover:text-blue-600">Accessories</button>
              <ul x-show="open" x-transition class="absolute mt-2 w-48 bg-white border rounded shadow">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Basketballs</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Bags & Backpacks</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Socks</a></li>
              </ul>
            </li>
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <button @mouseover="open=true" @click="open=!open"
                      class="px-3 py-2 text-gray-700 hover:text-blue-600">Apparel</button>
              <ul x-show="open" x-transition class="absolute mt-2 w-48 bg-white border rounded shadow">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">T‑shirts</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Hoodies & Sweatshirts</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Shorts</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Jerseys</a></li>
              </ul>
            </li>
            <li class="relative" x-data="{ open: false }" @mouseleave="open=false">
              <button @mouseover="open=true" @click="open=!open"
                      class="px-3 py-2 text-gray-700 hover:text-blue-600">Collectibles</button>
              <ul x-show="open" x-transition class="absolute mt-2 w-40 bg-white border rounded shadow">
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Art</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Figures</a></li>
              </ul>
            </li>
          </ul>
        </div>
  
        <!-- Desktop utilities (right) -->
        <div class="hidden lg:flex lg:items-center lg:space-x-6">
          <!-- Search 
          <input type="search" placeholder="Search"
                 class="px-2 py-1 border rounded text-sm focus:ring"/>-->
          <!-- Profile -->
          <div class="relative" x-data="{ open: false }" @mouseleave="open=false">
            <button @click="open=!open" class="px-3 py-2 text-gray-700 hover:text-blue-600">Profile</button>
            <ul x-show="open" x-transition class="absolute right-0 mt-2 w-40 bg-white border rounded shadow">
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">My Orders</a></li>
              <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a></li>
            </ul>
          </div>
          <!-- Cart -->
          <a href="#" class="px-3 py-2 text-gray-700 hover:text-blue-600">Cart</a>
        </div>
      </div>
    </div>
  

    <div x-show="mobileOpen" x-transition class="lg:hidden border-t">
      <ul class="space-y-1 px-2 py-3">
        <!-- Shoes w/ submenu -->
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Shoes
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Basketball</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Lifestyle</a></li>
          </ul>
        </li>
        <!-- Accessories w/ submenu -->
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Accessories
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Basketballs</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Bags & Backpacks</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Socks</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Hats</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Headbands</a></li>
          </ul>
        </li>
        <!-- Apparel w/ submenu -->
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Apparel
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">T‑shirts</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Hoodies & Sweatshirts</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Shorts</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Jerseys</a></li>
          </ul>
        </li>
        <!-- Collectibles w/ submenu -->
        <li x-data="{ open: false }">
          <button @click="open=!open" class="w-full flex justify-between px-3 py-2 rounded hover:bg-gray-100">
            Collectibles
            <svg :class="open ? 'rotate-90' : ''" class="h-4 w-4 transform transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
          </button>
          <ul x-show="open" class="pl-4 space-y-1">
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Art</a></li>
            <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Figures</a></li>
          </ul>
        </li>
        <!-- Profile & Cart -->
        <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Profile</a></li>
        <li><a href="#" class="block px-3 py-2 rounded hover:bg-gray-100">Cart</a></li>
      </ul>
    </div>
  </nav>
  
  <!-- page content -->
  <main class="container mx-auto py-4">
    {{ $slot }}
  </main>
  <footer class="bg-gray-800 text-gray-200 pt-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
  
      <!-- Customer Service -->
      <div>
        <h4 class="font-semibold mb-4">Customer Service</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">Help Center</a></li>
          <li><a href="#" class="hover:text-white">Shipping & Returns</a></li>
          <li><a href="#" class="hover:text-white">Track Order</a></li>
          <li><a href="#" class="hover:text-white">Contact Us</a></li>
        </ul>
      </div>
  
      <!-- Company -->
      <div>
        <h4 class="font-semibold mb-4">Company</h4>
        <ul class="space-y-2 text-sm">
          <li><a href="#" class="hover:text-white">About Us</a></li>
          <li><a href="#" class="hover:text-white">Careers</a></li>
          
        </ul>
      </div>
  
      <!-- Legal & Payments -->
      <div>
        <h4 class="font-semibold mb-4">Legal</h4>
        <ul class="space-y-2 text-sm mb-4">
          <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
          <li><a href="#" class="hover:text-white">Terms of Service</a></li>
          <li><a href="#" class="hover:text-white">Cookie Settings</a></li>
        </ul>
        <div class="flex space-x-2">
          <!-- placeholder icons -->
          <img src="/images/payments/visa.svg" alt="Visa" class="h-6"/>
          <img src="/images/payments/mastercard.svg" alt="Mastercard" class="h-6"/>
          <img src="/images/payments/paypal.svg" alt="PayPal" class="h-6"/>
        </div>
      </div>
  
      <!-- Newsletter & Social -->
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
