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
        Schema::create('page_visitors', function (Blueprint $table) {
            $table->id();
            $table->morphs('visitable'); // visitable_id + visitable_type

            // Visitor info
            $table->string('ip')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('device')->nullable();
            $table->string('platform')->nullable();
            $table->string('browser')->nullable();
            $table->text('user_agent')->nullable();

            // Optional tracking
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('session_id')->nullable();

            // Location (optional)
            $table->string('country')->nullable();
            $table->string('city')->nullable();

            $table->timestamps();

            // Optional index for performance
            $table->index(['ip', 'visitable_id', 'visitable_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_visitors');
    }
};
