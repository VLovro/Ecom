<x-layout heading="{{ $product->product_name }}">

  @if (session('success'))
    <input type="hidden" id="flash-success" value="{{ session('success') }}">
@endif
  
  <div id="toast-notification" class="fixed top-4 right-4 z-50 opacity-0 pointer-events-none transition-opacity duration-300">
    <div class="bg-green-500 text-white px-6 py-3 rounded-md shadow-lg flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span id="toast-message"></span>
        </div>
    </div>
  
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
    <!-- Liva strana(slika) -->
    <div>
      <img
        src="{{ asset($product->image_path) }}"
        alt="{{ $product->product_name }}"
        class="w-full h-auto rounded-lg"
      />
    </div>

    
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
   <div x-data="{ selectedSize: null }" class="mt-6">
  <h2 class="text-lg font-medium text-gray-900">Size</h2>

  <div class="mt-2 flex space-x-2">
    @foreach($product->sizes as $size)
      <button
        type="button"
        @click="selectedSize = {{ $size->id }}""
        :class="selectedSize === {{ $size->id }}
                ? 'bg-blue-600 text-white'
                : 'border text-gray-700 hover:bg-gray-100'" 
        class="px-4 py-2 rounded-full text-sm transition"
      >
        {{ $size->label }}
      </button>
    @endforeach
  </div>

  <p class="mt-2 text-sm text-red-500" x-show="!selectedSize">
    Please select a size to add this item to your cart.</p>
  <div class="mt-4 flex items-center space-x-4">
  <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST" class=" flex items-center space-x-4">
    @csrf
    <input type="hidden" name="id"      value="{{ $product->id }}">
    <input type="hidden" name="name"    value="{{ $product->product_name }}">
    <input type="hidden" name="price"   value="{{ $product->price }}">
    <input type="hidden" name="size_id" x-model="selectedSize">

    {{-- Quantity selector --}}
    <div class="flex-none">
      <div class="inline-flex items-center border rounded-full border-black bg-blue-700 overflow-hidden h-14">
        <button type="button" id="decrement-qty" class="px-4 text-white">–</button>
        <input
          type="text"
          name="qty"
          value="1"
          readonly
          id="quantity-input"
          data-stock="{{ $product->stock }}"
          class="w-12 text-center border-l border-r bg-blue-700 text-white focus:outline-none"
        />
        <button type="button" id="increment-qty" class="px-4 text-white">+</button>
      </div>
    </div>

    <button
      type="submit"
      :disabled="!selectedSize"
      class="flex-none bg-blue-600 text-white font-medium rounded-full h-14 px-8 flex items-center justify-center hover:bg-blue-800 transition disabled:opacity-50"
    >
      Add to Cart
    </button>
  </form>

  
  <button
    x-data="{ saved: false }"
    @click="saved = !saved"
    :class="saved
      ? 'bg-blue-600 border-blue-600'
      : 'border border-black hover:bg-gray-100'"
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

<script>
  const decrementButton = document.getElementById('decrement-qty');
  const quantityInput = document.getElementById('quantity-input');
  const incrementButton = document.getElementById('increment-qty');

  let StockValue = quantityInput.getAttribute('data-stock');
  const MaxStock = parseInt(StockValue);

  decrementButton.addEventListener('click', function(){
    let currentValueText = quantityInput.value;
    let currentValue = parseInt(currentValueText);

    if(currentValue > 1){
      currentValue--;
      quantityInput.value = currentValue;
    } else {
      alert('Minimum quantity is 1');
    }

  });

   incrementButton.addEventListener('click', function(){
    let currentValueText = quantityInput.value;
    let currentValue = parseInt(currentValueText);
    let potentialNewValue = currentValue + 1;
    if(potentialNewValue <= MaxStock){
      quantityInput.value = potentialNewValue;
    } else {
      alert('Maximum quantity is ' + MaxStock);
    }

  });
// --- Dio za toast notifikaciju --- //

   document.addEventListener('DOMContentLoaded', function() {
                    const toastNotification = document.getElementById('toast-notification');
                    const toastMessageSpan = document.getElementById('toast-message');
                    const flashSuccessInput = document.getElementById('flash-success');
                    if (flashSuccessInput && flashSuccessInput.value) {
                       
                        toastMessageSpan.textContent = flashSuccessInput.value;
                        toastNotification.classList.remove('opacity-0', 'pointer-events-none');
                        toastNotification.classList.add('opacity-100');

                      
                        setTimeout(function() {
                            toastNotification.classList.remove('opacity-100');
                            toastNotification.classList.add('opacity-0', 'pointer-events-none');
                        }, 3000); 
                    }

                });

</script>
    
  </div>
</x-layout>
