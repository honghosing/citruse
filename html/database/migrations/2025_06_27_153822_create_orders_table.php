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
            $table->enum('type', ['POS', 'POD']);
            $table->foreignId('business_id')->constrained('businesses')->cascadeOnDelete();
            $table->timestamp('shipping_date');
            $table->enum('status', [
                'New',
                'Accepted by Supplier',
                'In Delivery',
                'Delivered',
                'Rejected by Supplier',
                'Rejected by Distributor',
                'Cancelled'
            ]);
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
