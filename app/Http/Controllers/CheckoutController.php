<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{

   public function showCheckoutForm()
{
    // Pastikan session cart ada
    if (!session()->has('cart_session')) {
        return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
    }

    $cartItems = Cart::with('product')
                   ->where('session_id', session('cart_session'))
                   ->get();

    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong');
    }

    $total = $cartItems->sum(function($item) {
        return $item->product->harga * $item->quantity;
    });

    return view('checkout', compact('cartItems', 'total'));
}

    public function placeOrder(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
            'notes' => 'nullable|string'
        ]);
        
        $cartItems = Cart::with('product')
                        ->where('session_id', session('cart_session'))
                        ->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Keranjang belanja kosong');
        }
        
        // Hitung total
        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });
        
        // Buat order
        $order = Order::create([
            'order_number' => 'ORD-' . Str::upper(Str::random(8)),
            'session_id' => session('cart_session'),
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'shipping_address' => $request->shipping_address,
            'payment_method' => $request->payment_method,
            'total_amount' => $total,
            'status' => 'pending',
            'notes' => $request->notes
        ]);
        
        // Tambahkan order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price
            ]);
        }
        
        // Kosongkan keranjang
        Cart::where('session_id', session('cart_session'))->delete();
        
// Tambahkan ini untuk memastikan cart sudah kosong
logger()->info('Cart emptied', ['session_id' => session('cart_session')]);

// (Opsional tapi disarankan) reset session cart supaya tidak reuse lagi
session()->forget('cart_session');
        // Redirect ke halaman invoice
        return redirect()->route('invoice.show', $order->order_number);
    }
}