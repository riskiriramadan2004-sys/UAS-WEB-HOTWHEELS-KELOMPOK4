<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnDelete();

            $table->integer('quantity');

            $table->string('payment_method', 50);

            $table->timestamp('order_date')
                ->useCurrent();

            $table->enum('status', [
                'pending',
                'paid',
                'shipped',
                'completed'
            ])->default('pending');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};