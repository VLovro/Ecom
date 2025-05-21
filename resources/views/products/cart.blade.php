<x-layout>

    <main class="pt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

      
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Shopping Cart</h1>
    
        <div>

            
            @if($items->count() > 0)
              
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
                        <div class="space-y-4">
                            @foreach($items as $item)
                            
                                 <div class="flex flex-col sm:flex-row sm:items-center bg-gray-50 p-4 rounded-md gap-4">
                                      <div class="w-full sm:w-24 h-48 sm:h-24 overflow-hidden">
                                        <img loading="lazy" src="{{ asset($item->model->image_path) }}" alt="{{ $item->name }}" class="w-full h-full object-cover rounded-md" />
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800">{{$item->name}}</h4>

                                        <ul class="text-sm text-gray-600 mt-1">
                                           <li>Size: <span class="font-semibold">{{ $item->options->size_label }}</span></li>
                                     
                                        </ul>
                                        <span class="font-semibold text-gray-800 whitespace-nowrap">Item Subtotal: ${{$item->subTotal()}}</span>
                                      
                                    </div>
                                    <div class="mt-4 sm:mt-0 sm:ml-auto flex flex-row flex-wrap items-center gap-4">
                                     

                                        <div class="inline-flex items-center border border-gray-300 rounded-full overflow-hidden h-10">
                                            <form method="POST" action="{{ route('cart.qty.decrease', $item->rowId) }}" style="display: inline-flex;" class="flex-shrink-0">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="px-3 h-full flex items-center justify-center border-r w-8 border-gray-300 text-gray-700 hover:bg-gray-100 transition qty-control_reduce"
                                                      {{ $item->qty <= 1 ? 'disabled' : '' }}>
                                                    –
                                                </button>
                                            </form>
                                            <input
                                                type="number"
                                                name="quantity"
                                                value="{{ $item->qty }}"
                                                min="1"
                                                readonly
                                                class="w-10 text-center h-full border-none focus:outline-none bg-gray-50 px-1"
                                            >
                                            <form method="POST" action="{{ route('cart.qty.increase', $item->rowId) }}" style="display: inline-flex;" class="flex-shrink-0">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="px-3 h-full flex items-center justify-center border-l w-8 border-gray-300 text-gray-700 hover:bg-gray-100 transition qty-control_increase">+</button>
                                            </button>
                                            </form>
                                        </div>

                                        

                                        {{-- Remove Button --}}
                                        <form method="POST" action="{{ route('cart.remove', ['rowId'=>$item->rowId]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-gray-400 hover:text-red-600 transition">
                                                 <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"/>
                                                <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"/>
                                            </svg>
                                            </button>
                                        </form>

                                    </div> 

                                </div> 
                            @endforeach
                        </div> 
                    </div>
                    <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-md">
                      <div class="flex justify-between text-gray-700">
                        <span>Subtotal</span>
                        <span class="font-semibold">${{Cart::instance('cart')->subtotal()}}</span>                        
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Shipping</span>
                        <span class ="font-semibold">Free</span>
                    </div>
                     <div class="flex justify-between text-gray-700">
                        <span class="font-bold">Total(with VAT)</span>
                        <span class="font-semibold">${{Cart::instance('cart')->subtotal()}}</span>                        
                    </div>
                   <div class="mt-6 flex flex-col space-y-4">
                            <a href="{{ route('products.checkout') }}" class="w-full text-center bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">
                                Buy Now
                            </a>
                            
                            <a href="{{ route('products.index') }}" class="w-full text-center bg-gray-200 text-gray-700 px-6 py-3 rounded-md hover:bg-gray-300 transition">
                                Continue Shopping
                            </a>
                        </div>


                </div> 

            @else
             
                <div class="text-center py-10"> 
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Your cart is empty</h2>
                    <a href="{{ route('products.index') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 transition">Continue Shopping</a> {{-- Styled button link --}}
                </div>
            @endif

        </div> 
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                $("button.qty-control_increase").on("click", function(e) {
                    $(this).closest('form').submit();
                });

         
                $("button.qty-control_reduce").on("click", function(e) {
        
                    const quantityInput = $(this).closest('.inline-flex').find('input[type="number"]');

                    let currentValue = parseInt(quantityInput.val()); 

     
                    if (currentValue > 1) {
                 
                        $(this).closest('form').submit();
                    } else {
              
                        e.preventDefault(); 
                        console.log('Minimum quantity reached, preventing decrease.'); 
                        
                    }
                });
            });
        </script>

    </main>
</x-layout>
