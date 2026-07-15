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
            $table->string('site_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('videoUrl')->nullable();
            $table->string('favicon')->nullable();
            $table->json('phones')->nullable()->after('site_name');
            $table->json('emails')->nullable()->after('phones');
            $table->json('addresses')->nullable()->after('emails');
            $table->string('whitebglogo')->nullable();
            $table->longText('map')->nullable();
            $table->string('currency')->nullable();
            $table->string('position')->nullable();
            $table->string('url')->nullable();
            $table->string('iosUrl')->nullable();
            $table->string('androidUrl')->nullable();
            $table->string('webUrl')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('google_pixle')->nullable();
            $table->string('facebook_pixle')->nullable();
            $table->string('fb')->nullable();
            $table->string('wp')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkdi')->nullable();
            $table->longText('term_condition')->nullable();
            $table->longText('privacy_policy')->nullable();
            $table->longText('return_policy')->nullable();
            $table->longText('about_us')->nullable();

            $table->longText('footer_content')->nullable();
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
