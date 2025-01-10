<?php

namespace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $userId = Auth::id(); // Get the authenticated user ID
        $carts = Cart::where('user_id', $userId)->with('product')->paginate(10);

        // Calculate total quantity and total price
        $totalQty = $carts->sum('qty'); // Sum of all cart item quantities
        $totalPrice = $carts->sum(function ($cart) {
            return $cart->qty * $cart->product->price; // Calculate total price
        });

        return view('cart', compact('carts', 'totalQty', 'totalPrice'));
    }

    public function addToCart(Request $request, $id)
    {
        $userId = Auth::id();

        $checkProductInCart = cart::where('user_id', $userId)
            ->where('product_id', $id)
            ->first();

        if ($checkProductInCart) {
            return redirect('/')->with('error', 'Product is already in your cart.');
        }

        Cart::create([
            'user_id' => $userId,
            'product_id' => $id,
            'qty' => 1,
        ]);

        return redirect('/')->with('success', 'Product added to cart successfully.');
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->where('id', $id)->first();

        if ($cart) {

            $cart->qty = $request->qty;
            $cart->save();

            return redirect()->route('list.cart')->with('success', 'Cart updated successfully.');
        }

        return redirect()->route('list.cart')->with('error', 'Cart item not found.');
    }

    public function destroy($id)
    {
        $userId = Auth::id();

        $cart = Cart::where('user_id', $userId)->where('id', $id)->first();

        if ($cart) {

            $cart->delete();

            return redirect()->route('list.cart')->with('success', 'Cart item removed successfully.');
        }

        return redirect()->route('list.cart')->with('error', 'Cart item not found.');
    }
}
