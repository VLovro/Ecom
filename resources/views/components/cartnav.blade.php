<a href="{{ route('cart.index') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 relative">
  <svg xmlns="public\images\shopping-basket.svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
    </svg>
  @if(Cart::instance('cart')->content()->count() > 0)
    <span class="absolute top-1 right-1 bg-red-500 text-white text-xs rounded-full px-2">
      {{ Cart::instance('cart')->content()->count() }}
    </span>
  @endif
</a>