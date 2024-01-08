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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->unique();
            $table->string('mobile_number');
            $table->decimal('lat', 10, 8); // Precision: 10, Scale: 8
            $table->decimal('long', 11, 8); // Precision: 11, Scale: 8
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
