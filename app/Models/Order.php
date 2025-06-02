<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'payment_method',
        'notes',
        'status',
        'order_number',
        
    ];

    // app/Models/Order.php
public function items()
{
    return $this->hasMany(OrderItem::class);
}
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($order) {
    //         $order->order_number = 'ORD-' . strtoupper(uniqid());
    //     });
    // }

    //     public function items()
    // {
    //     return $this->hasMany(OrderItem::class);
    // }
}
