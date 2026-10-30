<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $fillable = ['key', 'type', 'title', 'subtitle', 'meta_title', 'meta_description', 'blocks', 'image', 'gallery', 'body'];
}
