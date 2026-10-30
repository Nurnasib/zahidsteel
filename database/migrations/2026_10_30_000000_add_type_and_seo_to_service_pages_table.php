<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_pages', function (Blueprint $table) {
            // service = Services menu pages, product = Products menu pages
            $table->string('type')->default('service')->after('key')->index();
            $table->string('meta_title')->nullable()->after('subtitle');
            $table->string('meta_description', 500)->nullable()->after('meta_title');
        });
    }

    public function down(): void
    {
        Schema::table('service_pages', function (Blueprint $table) {
            $table->dropColumn(['type', 'meta_title', 'meta_description']);
        });
    }
};
