<a href="{{ route('cart.index') }}" class="px-3 py-2 text-gray-700 hover:text-blue-600 relative">
  Cart
  @if(Cart::instance('cart')->content()->count() > 0)
    <span class="absolute top-1 right-1 bg-red-500 text-white text-xs rounded-full px-2">
      {{ Cart::instance('cart')->content()->count() }}
    </span>
  @endif
</a>