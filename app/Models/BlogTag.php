<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    public function blogs(){
        return $this->hasOne(Blog::class,'id','blog_id');
    }
}
