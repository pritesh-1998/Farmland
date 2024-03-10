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
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('buyierID');
            $table->string('buyerName');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('pincode');
            $table->string('language');
            $table->string('planName');
            $table->string('planActive');
            $table->string('plan_duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyers');
    }
};
