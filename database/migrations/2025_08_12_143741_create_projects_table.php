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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');             // e.g. Kitchen, Bathroom
            $table->string('image');             // e.g. project-1.jpg
            $table->unsignedInteger('project_count'); // e.g. 72
            $table->string('link')->nullable();  // optional: detail page or external link
            $table->unsignedInteger('order')->default(0); // to control display
            $table->string('animation_delay')->nullable(); // optional for WOW.js animation delay
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
