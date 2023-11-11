<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('market_items')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('buyer_id');
            $table->boolean('pending')->default(1); //1 - pending orders 0 - received orders
            $table->integer('total_quantity');
            $table->float('total_amount', 8, 2);
            // $table->enum('payment', ['gcash', 'cod']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
