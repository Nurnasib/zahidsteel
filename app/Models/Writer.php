<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'description',
        'image',
        'fb',
        'wp',
        'twitter',
        'youtube',
        'linkdi',
    ];



    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_writers', 'writer_id', 'blog_id');
    }
}
