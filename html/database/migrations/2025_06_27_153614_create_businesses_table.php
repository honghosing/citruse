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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('country');
            $table->string('vat_number');
            $table->enum('business_type', ['producer', 'distributor']);
            $table->foreignId('primary_sales_contact_id')->nullable()->constrained('contacts')->nullOnDelete();
            $table->foreignId('primary_logistics_contact_id')->nullable()->constrained('contacts')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
