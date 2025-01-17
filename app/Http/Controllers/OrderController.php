<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $userId = Auth::id();
        $carts = cart::where('user_id', $userId)->with('product')->get();

        if ($carts->isEmpty()) {
            return redirect()->route('list.cart')->with('error', 'Your cart is empty!');
        }

        foreach ($carts as $cart) {
            $order = order::create([
                'user_id' => $userId,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty
            ]);

        }

        Cart::where('user_id', $userId)->delete();

        // Redirect with success message
        return redirect()->route('list.cart')->with('success', 'Your order has been placed successfully!');
    }

    public function allOrder()
    {
        $orders = Order::with(['product', 'user'])->paginate(8);

        return view('admin.order.list', compact('orders'));
    }


    public function viewUserOrder()
    {
        $userId = Auth::id(); // Get the authenticated user ID
        $orders = Order::where('user_id', $userId) // Get orders for the authenticated user
            ->with('product') // Load product details
            ->paginate(5); // Paginate the results

        return view('order', compact('orders')); // Pass orders to the view
    }   

}
