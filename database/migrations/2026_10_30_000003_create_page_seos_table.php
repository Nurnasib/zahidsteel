<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // SEO for fixed (non-CMS) pages, keyed by route name
        Schema::create('page_seos', function (Blueprint $table) {
            $table->id();
            $table->string('route_name')->unique();
            $table->string('label');
            $table->string('meta_title')->nullable();
            $table->string('meta_description', 500)->nullable();
            $table->timestamps();
        });

        $now = now();
        DB::table('page_seos')->insert(array_map(fn ($row) => $row + ['created_at' => $now, 'updated_at' => $now], [
            ['route_name' => 'home',             'label' => 'Home'],
            ['route_name' => 'about-us',         'label' => 'About Us'],
            ['route_name' => 'client.list',      'label' => 'Certifications'],
            ['route_name' => 'factory',          'label' => 'Factory & Facilities'],
            ['route_name' => 'complete-project', 'label' => 'Completed Projects'],
            ['route_name' => 'running-project',  'label' => 'Running Projects'],
            ['route_name' => 'gallery',          'label' => 'Gallery'],
            ['route_name' => 'blog.index',       'label' => 'News & Events'],
            ['route_name' => 'contact-us',       'label' => 'Contact Us'],
            ['route_name' => 'brochure',         'label' => 'Brochure'],
        ]));
    }

    public function down(): void
    {
        Schema::dropIfExists('page_seos');
    }
};
