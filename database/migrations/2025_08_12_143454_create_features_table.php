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
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('icon_class');         // Font Awesome icon class
            $table->string('title');              // Feature title
            $table->text('description');          // Feature description
            $table->unsignedInteger('order')->default(0);  // Display order
            $table->string('animation_delay')->nullable(); // Optional for WOW delay (e.g., 0.1s)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
