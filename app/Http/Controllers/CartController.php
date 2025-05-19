<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('products.cart', compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'qty' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'size_id' => 'required|integer|exists:sizes,id',
        ]);

        $size = \App\Models\Size::findOrFail($request->size_id);

        Cart::instance('cart')->add(
            $request->id,
            $request->name,
            $request->qty,
            $request->price,
            [
                'size_id' => $size->id,
                'size_label' => $size->label,
            ]
        )->associate('App\Models\Product');
         return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();

    }

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }

    public function remove_item($rowId){
        Cart::instance('cart')->remove($rowId);
        return redirect()->back();
    }

    public function showCheckoutPage(){
        $items = Cart::instance('cart')->content();
         return view('products.checkout', compact('items'));
    }



}

