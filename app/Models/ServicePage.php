<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $fillable = ['key', 'title', 'subtitle', 'blocks', 'image', 'gallery', 'body'];
}
