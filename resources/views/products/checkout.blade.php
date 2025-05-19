<x-layout heading="Checkout">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">    
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Checkout</h1>
        <form action="#" method="POST"> 
            @csrf 
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-8 bg-white p-6 rounded-lg shadow-md">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Shipping Address</h2>
                        <div class="space-y-4">
                            <div>
                                <label for="full_name" class="block text-sm font-medium text-gray-700">Full Name</label>
                                <input type="text" name="full_name" id="full_name" autocomplete="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                                <input type="email" name="email" id="email" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>

                            <div>
                                <label for="address_line_1" class="block text-sm font-medium text-gray-700">Street Address Line 1</label>
                                <input type="text" name="address_line_1" id="address_line_1" autocomplete="street-address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="address_line_2" class="block text-sm font-medium text-gray-700">Street Address Line 2 (Optional)</label>
                                <input type="text" name="address_line_2" id="address_line_2" autocomplete="address-line2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" id="city" autocomplete="address-level2" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="flex-1"> 
                                    <label for="state" class="block text-sm font-medium text-gray-700">State / Province</label>
                                    <input type="text" name="state" id="state" autocomplete="address-level1" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                
                                <div class="flex-1"> 
                                    <label for="zip" class="block text-sm font-medium text-gray-700">Zip / Postal Code</label>
                                    <input type="text" name="zip" id="zip" autocomplete="postal-code" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <select id="country" name="country" autocomplete="country-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="GB">United Kingdom</option>
                                    <option value="HR">Croatia</option>
                   
                                </select>
                            </div>
                        </div> 
                    </div> 
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800 mb-4">Payment Information</h2>
                        <div x-data="{ selectedPaymentMethod: 'credit_card' }">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Payment Method</label>
                            <div class="mt-2 space-y-4"> 
                                
                                <div class="flex items-center">
                                    <input id="payment_credit_card" name="payment_method" type="radio" value="credit_card" x-model="selectedPaymentMethod" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="payment_credit_card" class="ml-3 block text-sm font-medium text-gray-700">
                                        Credit Card
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="payment_on_delivery" name="payment_method" type="radio" value="on_delivery" x-model="selectedPaymentMethod" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                                    <label for="payment_on_delivery" class="ml-3 block text-sm font-medium text-gray-700">
                                        On Delivery
                                    </label>
                                </div>
                            </div>
                            <div x-show="selectedPaymentMethod === 'credit_card'" class="mt-4 space-y-4">
                                <div>
                                    <label for="card_name" class="block text-sm font-medium text-gray-700">Name on Card</label>
                                    <input type="text" name="card_name" id="card_name" autocomplete="cc-name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="card_number" class="block text-sm font-medium text-gray-700">Credit card number</label>
                                    <input type="text" name="card_number" id="card_number" autocomplete="cc-number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                </div>
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <div class="flex-1 flex flex-col sm:flex-row gap-4">
                                        <div class="flex-1">
                                            <label for="exp_month" class="block text-sm font-medium text-gray-700">Exp Month</label>
                                            <input type="text" name="exp_month" id="exp_month" autocomplete="cc-exp-month" placeholder="MM" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>

                                        <div class="flex-1">
                                            <label for="exp_year" class="block text-sm font-medium text-gray-700">Exp Year</label>
                                            <input type="text" name="exp_year" id="exp_year" autocomplete="cc-exp-year" placeholder="YYYY" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                        </div>
                                    </div>

                                    {{-- CVV --}}
                                    <div class="flex-1 sm:flex-none sm:w-1/3">
                                        <label for="cvv" class="block text-sm font-medium text-gray-700">CVV</label>
                                        <input type="text" maxlength="3" name="cvv" id="cvv" autocomplete="csc" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                    </div>
                                </div> 

                            </div> 

                        </div> 

                    </div> 

                </div> 
                <div class="lg:col-span-1 bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Order Summary</h2>
                    <div class = "space-y-2">
                        @foreach ($items as $item )
                        <div class="flex flex-col sm:flex-row sm:items-center gap-4 border-b pb-4 last:border-b-0 last:pb-0">
                        <div class="w-full sm:w-24 h-48 sm:h-24 overflow-hidden">
                         <img loading="lazy" src="{{ asset($item->model->image_path) }}" alt="{{ $item->name }}" class="w-full h-full object-cover rounded-md" />
                         </div>
                          <div class="flex-1">
                                        <h4 class="font-semibold text-gray-800">{{$item->name}}</h4>

                                        <ul class="text-sm text-gray-600 mt-1">
                                           <li>Size: <span class="font-semibold">{{ $item->options->size_label }}</span></li>
                                     
                                        </ul>
                          </div>
                          <div class="flex-shrink-0 text-right font-semibold text-gray-900"> ${{ number_format($item->subTotal(), 2) }}
                        </div>
                          </div>
                            
                        @endforeach
                         <div class="flex justify-between text-gray-700">
                        <span>Subtotal</span>
                        <span class="font-semibold">${{Cart::instance('cart')->subtotal()}}</span>                        
                    </div>
                    </div>
                    <div class="mt-8 flex justify-center">
                <button type="submit" class="w-full sm:w-auto bg-blue-600 text-white font-medium rounded-md py-3 px-8 hover:bg-blue-800 transition">
                    Place Order
                </button>
            </div>
                </div>
            </div>
            


        </form>

    </div> 

</x-layout>
