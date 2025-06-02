<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    // Helper untuk ambil session ID yang konsisten
    private function getCartSessionId()
    {
        if (!session()->has('cart_session')) {
            session()->put('cart_session', Str::random(30));
        }

        return session('cart_session');
    }

    public function index()
    {
        $sessionId = $this->getCartSessionId();

        $cartItems = Cart::with('product')
            ->where('session_id', $sessionId)
            ->get();
            
        $total = $cartItems->sum(function ($item) {
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

        $sessionId = $this->getCartSessionId();
        
        $existingItem = Cart::where('product_id', $request->product_id)
            ->where('session_id', $sessionId)
            ->first();
        
        if ($existingItem) {
            $existingItem->update([
                'quantity' => $existingItem->quantity + $request->quantity
            ]);
        } else {
            Cart::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'session_id' => $sessionId
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

        $sessionId = $this->getCartSessionId();

        $cartItem = Cart::firstOrNew([
            'session_id' => $sessionId,
            'product_id' => $request->product_id
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
        $sessionId = $this->getCartSessionId();

        $count = Cart::where('session_id', $sessionId)->sum('quantity');

        return response()->json(['count' => $count]);
    }
}
