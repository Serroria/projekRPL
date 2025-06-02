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

        $total = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'total'));
    }

    public function placeOrder(Request $request)
    {

        $validated = $request->validate([
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

        // Hitung total harga dari semua item di keranjang
        $total = $cartItems->sum(function ($item) {
            return $item->product->harga * $item->quantity;
        });
        // dd($total);

        //order_number, check if customer_email already exists, and generate a unique order number, count first.
        $customerName = $validated['customer_name'];
        //custom based on customer_name, split by space and take the first letter of each word, then concatenate with a random string.
        $orderNumber = 'ORD-'
            . strtoupper(Str::of($customerName)->explode(' ')
                ->map(fn($word) => Str::substr($word, 0, 1))->implode(''))
            . '-';
        $existingOrder = Order::where('customer_email', $validated['customer_email'])
            ->first();
        //jika sudah ada, count dan + 1
        if ($existingOrder) {
            $orderCount = Order::where('customer_email', $validated['customer_email'])->count();
            $orderNumber .= $orderCount + 1;
        } else {
            // Jika belum ada, gunakan 1
            $orderNumber .= '1';
        }




        // Buat order
        $order = Order::create([
            'order_number' => $orderNumber,
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'shipping_address' => $validated['shipping_address'],
            'payment_method' => $validated['payment_method'],
            'notes' => $request->notes,
            'total_amount' => $total,
            'status' => 'pending'
        ]);

        // Tambahkan order items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->harga
            ]);
        }

        // Kosongkan keranjang
        Cart::where('session_id', session('cart_session'))->delete();

        // Tambahkan ini untuk memastikan cart sudah kosong
        logger()->info('Cart emptied', ['session_id' => session('cart_session')]);

        // (Opsional tapi disarankan) reset session cart supaya tidak reuse lagi
        session()->forget('cart_session');
        // Redirect ke halaman invoice
        // return redirect()->route('invoice.show', $order);

        return redirect()->route('invoice', $order->id);

    }
}