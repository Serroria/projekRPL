<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
      public function up(){
        Schema::create('orders', function (Blueprint $table){
            $table->id();
            $table->string('order_number')->unique()->after('id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->text('shipping_address');
            $table->string('payment_method');
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'dikirim', 'dibatalkan'])->default('pending');
            $table->timestamps();
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'order_number',
                'customer_name',
                'customer_email',
                'customer_phone',
                'shipping_address',
                'payment_method',
                'notes',
                'status',
            ]);
        });
    }
};
