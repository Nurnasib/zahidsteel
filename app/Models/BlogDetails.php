<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetails extends Model
{
    protected $fillable = [
        'blog_id',
        'title',
        'description',
        'image'
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
