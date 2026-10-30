<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->cascadeOnDelete(); // null = top-level item
            $table->string('title');
            $table->foreignId('page_id')->nullable()->constrained('service_pages')->nullOnDelete(); // link to a CMS page…
            $table->string('url')->nullable();                                                    // …or a custom path / external URL
            $table->boolean('new_tab')->default(false);
            $table->boolean('status')->default(true);
            $table->unsignedInteger('serial')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
