<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;
use Barryvdh\DomPDF\Facade\Pdf;


class InvoiceController extends Controller
{

    public function show(Order $order)
    {
        $order->load('items.product');
    $order->total_amount = $order->items->sum(function($item) {
        return $item->price * $item->quantity;
    });
        return view('invoice', compact('order'));
        // Mail::to($order->customer_email)->send(new InvoiceMail($order));
    }

   

public function download($orderNumber)
{
    $order = Order::with('items.product')->where('order_number', $orderNumber)->firstOrFail();
    
    $pdf = Pdf::loadView('invoice', compact('order'));
    return $pdf->download("Invoice-{$order->order_number}.pdf");
}




    // public function sendInvoice($orderNumber)
// {
//     $order = Order::with('items.product')
//                 ->where('order_number', $orderNumber)
//                 ->firstOrFail();

    //     // Pilihan 1: Kirim via WhatsApp
//     $whatsappUrl = $this->generateWhatsAppUrl($order);

    //     // Pilihan 2: Kirim via Email
//     Mail::to($order->customer_email)->send(new InvoiceMail($order));

    //     return redirect()->back()->with('success', 'Invoice telah dikirim');
// }

    // private function generateWhatsAppUrl($order)
// {
//     $message = "Halo {$order->customer_name},\n\n";
//     $message .= "Berikut detail pesanan Anda:\n";
//     $message .= "No. Order: {$order->order_number}\n";

    //     foreach ($order->items as $item) {
//         $message .= "- {$item->product->name} (x{$item->quantity}) Rp ".number_format($item->price)."\n";
//     }

    //     $message .= "\nTotal: Rp ".number_format($order->total_amount);
//     $message .= "\n\nStatus: {$order->status}";
//     $message .= "\n\nTerima kasih telah berbelanja!";

    //     $encodedMessage = urlencode($message);
//     return "https://wa.me/{$order->customer_phone}?text={$encodedMessage}";
// }
}