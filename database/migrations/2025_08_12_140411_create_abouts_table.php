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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // e.g., "History of Our Creation"
            $table->string('highlighted_word')->nullable(); // "History" from title
            $table->string('image1')->nullable(); // about-1.jpg
            $table->string('image2')->nullable(); // about-2.jpg
            $table->string('image_caption')->nullable(); // "Award Winning Studio Since 1990"
            $table->text('paragraph1')->nullable();
            $table->text('paragraph2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
