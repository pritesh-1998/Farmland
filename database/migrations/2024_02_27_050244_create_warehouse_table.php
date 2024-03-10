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
        Schema::create('warehouse', function (Blueprint $table) {
            $table->id();
            $table->string('farmerid');
            $table->text('product')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 10, 2);
            $table->string('location');
            $table->integer('quantity');
            $table->integer('status');
            $table->integer('payment_mode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouse');
    }
};
