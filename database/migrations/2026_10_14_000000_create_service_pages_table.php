<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_pages', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();   // design | erection | fabrication | supply
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->json('image')->nullable();  // responsive hero image (optional)
            $table->longText('body')->nullable(); // rich-text (Summernote) content
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_pages');
    }
};
