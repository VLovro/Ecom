<x-layout>
  
  <main class = "pt-8 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

     <h1 class="text-2xl font-bold text-gray-900 mb-6">Shopping Cart</h1>

    <div>

      @if($items->count()>0)
      <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class = "lg:col-span-2 bg-white p-6 rounded-lg shadow-md">
           <table class="w-full border-collapse">
            <thead>
               <tr>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Product</th>
                <th class="px-4 py-2"></th> 
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Price</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Quantity</th>
                <th class="px-4 py-2 text-left text-gray-600 font-semibold">Subtotal</th> 
                <th class="px-4 py-2"></th> 
                </tr>
                               
            </thead>
            <tbody>
                               
            @foreach($items as $item)

            <tr class="border-b border-gray-200 last:border-b-0">
              <td class="px-4 py-2 w-24">
                <img loading="lazy" src="{{ asset($item->model->image_path) }}" width="120" height="120" alt="{{ $item->name }}" class="w-full h-auto rounded-md" />
              </td>
              <td class="px-4 py-2">
                <h4 class="font-semibold">{{ $item->name }}</h4>
                <ul text-sm text-gray-600 mt-1>
                   <li>Size: {{ $item->options->size_label }}</li>
                </ul>
              </td>
              <td class="px-4 py-2">
                <span>{{ $item->price }}</span>
              </td>
                <td class="px-4 py-2">
                  <div class="inline-flex items-center border border-gray-300 rounded overflow-hidden h-10">

                       {{-- Added flex-grow-0 to the form --}}
                       <form method="POST" action="{{ route('cart.qty.decrease', $item->rowId) }}" style="display: inline-flex;" class="flex-grow-0">
                           @csrf
                           @method('PUT')
                           <button type="submit" class="px-3 h-full flex items-center justify-center border-r border-gray-300 text-gray-700 hover:bg-gray-100 transition qty-control_reduce">
                               –
                           </button>
                       </form>

                       <input
                           type="number"
                           name="quantity"
                           value="{{ $item->qty }}"
                           min="1"
                           readonly
                           class="w-10 text-center h-full border-none focus:outline-none"
                       >

                       {{-- Added flex-grow-0 to the form --}}
                       <form method="POST" action="{{ route('cart.qty.increase', $item->rowId) }}" style="display: inline-flex;" class="flex-grow-0">
                           @csrf
                           @method('PUT')
                           <button type="submit" class="px-3 h-full flex items-center justify-center border-l border-gray-300 text-gray-700 hover:bg-gray-100 transition qty-control_increase">+</button>
                       </button>
                       </form>
                   </div>
                </td>
                                       
                <td class="px-4 py-2">
                <span>${{$item->subTotal()}}</span>
                </td>
                  
                <td class="px-4 py-2">
                  <form method="POST" action="{{ route('cart.remove', ['rowId'=>$item->rowId]) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit">
                                                    
                  <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676" xmlns="http://www.w3.org/2000/svg">
                  <path d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                  <path d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                  </svg>
                  </button>
                  </form>
                                           
                </td>
              </tr>
                                    
            @endforeach
            </tbody>
            </table>
        </div>



        <div class="lg:col-span-1">
          <p> Checkout summary </p>
        </div>
        
      </div> 

      
            @else
                
                <div class="text-center py-10"> {{-- Center text and add vertical padding --}}
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