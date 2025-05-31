<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')
            ->where('session_id', session()->getId())
            ->get();
            
        $total = $cartItems->sum(function($item) {
            return $item->product->harga * $item->quantity;
        });
        
        return view('cart', compact('cartItems', 'total'));
    }
    
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        $existingItem = Cart::where('product_id', $request->product_id)
            ->where('session_id', session()->getId())
            ->first();
        
        if ($existingItem) {
            $existingItem->update([
                'quantity' => $existingItem->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'session_id' => session()->getId()
            ]);
        }
        
        return redirect()->route('cart.index');
    }
    
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        
        $cart->update([
            'quantity' => $request->quantity
        ]);
        
        return redirect()->route('cart.index');
    }
    
    public function remove(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index');
    }


    public function addToCartAjax(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1'
    ]);

    // Generate session ID jika belum ada
    if (!session()->has('cart_session')) {
        session()->put('cart_session', Str::random(30));
    }

    $cartItem = Cart::firstOrNew([
        'session_id' => session('cart_session'),
        'product_id' => $request->product_id,
        
    ]);

    $cartItem->quantity += $request->quantity;
    $cartItem->save();

    return response()->json([
        'success' => true,
        'message' => 'Produk ditambahkan ke keranjang'
    ]);
}

public function getCartCount()
{
    $count = 0;
    
    if (session()->has('cart_session')) {
        $count = Cart::where('session_id', session('cart_session'))->sum('quantity');
    }
    
    return response()->json(['count' => $count]);
}
}