<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;



class OrderController extends Controller
{
    public function placeOrder(Request $request) {
    $order = Order::create([
        'customer_name'     => $request->customer_name,
        'customer_email'    => $request->customer_email,
        'customer_phone'    => $request->customer_phone,
        'shipping_address'  => $request->shipping_address,
        'payment_method'    => $request->payment_method,
        'notes'             => $request->notes,
    ]);
    Mail::to($order->customer_email)->send(new \App\Mail\InvoiceMail($order));

    // Kosongkan keranjang
    Cart::remove();

    return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat.');

    }
public function index()
{
    $orders = Order::latest()->get();
    return view('admin.orders.index', compact('orders'));
}

public function updateStatus(Request $request, Order $order)
{
    $order->status = $request->status;
    $order->save();
    return back()->with('success', 'Status diperbarui.');
}


    
    // public function index()
    // {
    //     $orders = Order::latest()->paginate(10);
    //     return view('admin.orders.index', compact('orders'));
    // }
    
    // public function show(Order $order)
    // {
    //     return view('admin.orders.show', compact('order'));
    // }
    
    // public function updateStatus(Request $request, Order $order)
    // {
    //     $request->validate([
    //         'status' => 'required|in:pending,processing,shipped,completed,cancelled'
    //     ]);
        
    //     $order->update(['status' => $request->status]);
        
    //     return back()->with('success', 'Status order diperbarui');
    // }
}