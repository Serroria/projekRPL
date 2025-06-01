<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

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
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('orders', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('order_number')->unique()->after('id');

    //         $table->string('session_id')->nullable();
    //         $table->unsignedInteger('user_id')->nullable();
    //         $table->string('customer_name');
    // $table->string('customer_email');
    // $table->string('customer_phone');
    // $table->text('shipping_address');
    // $table->string('payment_method'); // transfer, cod, etc
    // $table->decimal('total_amount', 10, 2);
    // $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])->default('pending');
    // $table->text('notes')->nullable();
    //         $table->timestamps();
    //     });
    // }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //         Schema::table('orders', function (Blueprint $table) {
    //     $table->dropColumn('order_number');
    // });

    // }
};
