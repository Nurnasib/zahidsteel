<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    protected static function booted(): void
    {
        // Give new albums a unique slug; existing slugs stay put so album URLs don't break on rename
        static::saving(function (Gallery $album) {
            if (empty($album->slug)) {
                $base = Str::slug($album->title) ?: 'album';
                $slug = $base;
                for ($i = 2; static::where('slug', $slug)->where('id', '!=', $album->id ?? 0)->exists(); $i++) {
                    $slug = $base . '-' . $i;
                }
                $album->slug = $slug;
            }
        });
    }

    public function gallery()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function getUrlAttribute(): string
    {
        return route('gallery.album', $this->slug);
    }
}
