<x-layout>
      <main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="shop-checkout container">
      <h2 class="page-title">Cart</h2>
      
      <div class="shopping-cart">
        @if($items->count() > 0)
        <div class="cart-table__wrapper">
          <table class="cart-table">
            <thead>
              <tr>
                <th>Product</th>
                <th></th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)

              
              <tr>
                <td>
                  <div class="shopping-cart__product-item">
                    <img loading="lazy" src="{{ asset($item->model->image_path) }}" width="120" height="120" alt="{{ $item->name }}" />
                  </div>
                </td>
                <td>
                  <div class="shopping-cart__product-item__detail">
                    <h4>{{$item->name}}</h4>
                    <ul class="shopping-cart__product-item__options">
                      <li>Size: {{ $item->options->size_label }}</li>
                    </ul>
                  </div>
                </td>
                <td>
                  <span class="shopping-cart__product-price">{{$item->price}}</span>
                </td>
                <td>
                  {{-- Ovdi koristin tailwind --}}
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
                <td>
                  <span class="shopping-cart__subtotal">${{$item->subTotal()}}</span>
                </td>
                <td>
                  <form method ="POST", action="{{ route('cart.remove', ['rowId'=>$item->rowId]) }}">
                    @csrf
                    @method('DELETE')
                  <button type="submit" class="btn btn-light btn-icon">
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
          <div class="cart-table-footer">
            
            <button class="btn btn-light">UPDATE CART</button>
          </div>
        </div>
        <div class="shopping-cart__totals-wrapper">
          <div class="sticky-content">
            <div class="shopping-cart__totals">
              <h3>Cart Totals</h3>
              <table class="cart-totals">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>${{Cart::instance('cart')->subtotal()}}</td>
                  </tr>
                  <tr>
                    <th>Shipping</th>
                    <td>
                      Free
                    </td>
                  </tr>
                  <tr>
                    <th>VAT</th>
                    <td>${{Cart::instance('cart')->tax()}}</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>${{Cart::instance('cart')->total()}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mobile_fixed-btn_wrapper">
              <div class="button-wrapper container">
                <a href="{{ route('products.checkout') }}" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
              </div>
            </div>
          </div>
        </div>
        @else
        <div class = "row">
            <div class = "col-md-12 text-center">
                <h2 class = "text-danger">Your cart is empty</h2>
                <a href = "{{ route('products.index') }}" class = "btn btn-primary">Continue Shopping</a>
        </div>

        @endif
      </div>
    </section>
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