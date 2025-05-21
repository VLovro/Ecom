<?php

namespace App\Http\Controllers;
use App\Models\Order; 
use App\Models\OrderItem; 
use Surfsidemedia\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Str; 

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
        $validatedData = $request->validate([
            'shipping_full_name' => 'required|string|max:255',
            'shipping_email' => 'required|email|max:255',
            'shipping_address_line1' => 'required|string|max:255',
            'shipping_address_line2' => 'nullable|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_state_province' => 'nullable|string|max:255',
            'shipping_zip_postal_code' => 'required|string|max:20',
            'shipping_country' => 'required|string|max:255',
            'payment_method' => 'required|string|in:On Delivery,credit_card'
        ]);
        
        //jeli user logiran
        $userId = Auth::check() ? Auth::id() : null;

        $orderNumber = "ORD-" . Str::upper(Str::random(10));

         $totalAmount = Cart::instance('cart')->subtotal(2, '.', '');

         try{
            $order = Order::create([
                'user_id' => $userId,
                'order_number' => $orderNumber,
                'total_amount' => $totalAmount,
                'shipping_full_name' => $validatedData['shipping_full_name'],
                'shipping_email' => $validatedData['shipping_email'],
                'shipping_address_line1' => $validatedData['shipping_address_line1'],
                'shipping_address_line2' => $validatedData['shipping_address_line2'],
                'shipping_city' => $validatedData['shipping_city'],
                'shipping_state_province' => $validatedData['shipping_state_province'],
                'shipping_zip_postal_code' => $validatedData['shipping_zip_postal_code'],
                'shipping_country' => $validatedData['shipping_country'],
                'payment_method' => $validatedData['payment_method'],
            ]);
                foreach(Cart::instance('cart')->content() as $cartItem){
                    OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->id, 
                    'quantity' => $cartItem->qty,
                    'price' => $cartItem->price,
                    'size_id' => $cartItem->options->has('size_id') ? $cartItem->options->size_id : null, // Get size_id from options
                    ]);
                }
                Cart::instance('cart')->destroy();
                return redirect()->route('order.success')->with('success', 'Your order has been placed successfully!');
         }
           catch (\Exception $e) {
            return redirect()->back()->with('error', 'There was an error placing your order: ' . $e->getMessage());
        }
    }
}
