<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
   public function addToCart(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);
    $qty = $request->qty ?? 1;

    if ($request->has('update')) {
        // Update qty langsung
        $cart[$id]['qty'] = $qty;
    } else {
        // Tambah qty
        if(isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'nama' => $product->nama,
                'harga' => $product->harga,
                'gambar' => $product->gambar,
                'qty' => 1,
                'stok' => $product->stok
            ];
        }
    }

    session()->put('cart', $cart);
    return response()->json(['success' => 'Keranjang diperbarui']);
}


    public function showCart()
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['harga'] * $item['qty']);
        return view('cart.show', compact('cart', 'total'));
    }

    public function checkout(Request $request)
    {
        $cart = session('cart', []);
        // logika simpan pesanan bisa ditambahkan
        session()->forget('cart');
        return response()->json(['success' => 'Checkout berhasil!']);
    }
    public function cartData()
{
    $cart = session('cart', []);
    return response()->json($cart);
}

}
