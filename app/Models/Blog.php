<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $casts = [
        'createdTime' => 'datetime',
    ];



    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tags', 'blog_id', 'tag_id');
    }

    //    public function writers()
    //    {
    //        return $this->belongsToMany(BlogWriter::class, 'blog_writers', 'blog_id', 'writer_id');
    //    }

    public function writers()
    {
        return $this->belongsToMany(Writer::class, 'blog_writers', 'blog_id', 'writer_id');
    }

    public function writersInfo()
    {
        return $this->belongsToMany(Writer::class, 'blog_writers', 'blog_id', 'writer_id');
    }

    public function category()
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id');
    }
}
