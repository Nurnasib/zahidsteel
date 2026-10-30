<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('slug')->nullable()->unique()->after('title'); // album page: /gallery/{slug}
        });

        // Backfill slugs for existing albums
        foreach (DB::table('galleries')->orderBy('id')->get() as $album) {
            $base = Str::slug($album->title) ?: 'album';
            $slug = $base;
            for ($i = 2; DB::table('galleries')->where('slug', $slug)->exists(); $i++) {
                $slug = $base . '-' . $i;
            }
            DB::table('galleries')->where('id', $album->id)->update(['slug' => $slug]);
        }

        Schema::table('menus', function (Blueprint $table) {
            // Fill this item's submenu automatically, e.g. 'gallery_albums'
            $table->string('auto_children')->nullable()->after('url');
        });
    }

    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('auto_children');
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn('slug');
        });
    }
};
