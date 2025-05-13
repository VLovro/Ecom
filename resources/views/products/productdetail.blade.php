<x-layout heading="{{ $product->product_name }}">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Left column: image -->
    <div>
      <img
        src="{{ asset($product->image_path) }}"
        alt="{{ $product->product_name }}"
        class="w-full h-auto rounded-lg"
      />
    </div>

    <!-- Desna strana -->
    <div>
        <h1 class = "text-3xl font-bold">
            {{ $product->product_name }}
        </h1>
        <p class="mt-2 text-2xl font-semibold text-gray-800">
    {{ number_format($product->price, 2,) }}$
  </p>
  <p class="mt-4 text-gray-700">
  {{ $product->description }}
</p>
    <div x-data = "{selectedSize: null}" class= "mt-6">
        <h2 class="text-lg font-medium text-gray-900">Size</h2>
  <div class="mt-2 flex space-x-2">
    
    @foreach($product->sizes as $size)
      <button
        type="button"
        @click="selectedSize = {{ $size->id }}"
        :class="selectedSize === {{ $size->id }} 
                ? 'bg-blue-600 text-white' 
                : 'border text-gray-700 hover:bg-gray-100'"
        class="px-4 py-2 rounded-full text-sm transition"
      >
        {{ $size->label }}
      </button>
    @endforeach
    </div>

    </div>
<div class="mt-6 flex items-center  space-x-4 h-14">
  <div class="flex-none">
    <div class="inline-flex items-center border rounded-full overflow-hidden h-14">
      <button type="button" class="px-4 flex items-center justify-center h-full">–</button>
      <input
        type="text"
        value="1"
        readonly
        class="w-12 text-center border-l border-r h-full focus:outline-none "
      />
      <button type="button" class="px-4 flex items-center justify-center h-full">+</button>
    </div>
  </div>

<button
  type="button"
   class="flex-none bg-blue-600 text-white font-medium rounded-full text-center hover:bg-blue-800 transition h-14 px-8 flex items-center justify-center"
>
  Add to Cart
</button>

<button
  x-data="{ saved: false }"
  @click="saved = !saved"
  :class="saved
    ? 'bg-blue-600 border-blue-600'
    : 'border border-gray-300 hover:bg-gray-100'"
  class="flex-none h-14 w-14 flex items-center justify-center rounded-full transition"
  aria-label="Add to wishlist"
>
  <img
    src="https://icons.veryicon.com/png/o/commerce-shopping/fine-edition-mall-icon/wishlist-1.png"
    alt="Wishlist"
    class="h-6 w-6"
  />
</button>
</div>



    
  </div>
</x-layout>
