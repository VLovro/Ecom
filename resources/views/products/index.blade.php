<x-layout heading="{{ $currentGroup ? ucfirst($currentGroup) : 'All Products' }}">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    {{-- 1) Main 4-column grid on lg+ --}}
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
    
    @include('products.sidebar', [
    'groups'       => $groups,
    'currentGroup' => $currentGroup,
  ])

      
      <div class="lg:col-span-3 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($products as $product)
          <a href="{{ route('products.show', $product->id) }}" class="block border rounded-lg overflow-hidden bg-white hover:shadow-md hover:bg-gray-100 transition">
            <div class="w-full aspect-square overflow-hidden">
              <img src="{{ asset($product->image_path) }}"
                   alt="{{ $product->product_name }}"
                   class="w-full h-full object-cover" />
            </div>
            <div class="p-4">
              <h3 class="text-sm text-gray-700">{{ $product->product_name }}</h3>
              <p class="mt-1 text-lg font-semibold text-gray-900">
                ${{ number_format($product->price,2) }}
              </p>
            </div>
          </a>
        @endforeach
      </div>

    </div>

    {{-- Sidebar --}}
    <div class="mt-6">
      {{ $products->links() }}
    </div>
  </div>
</x-layout>
