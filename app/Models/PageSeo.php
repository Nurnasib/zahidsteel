<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    protected $fillable = ['route_name', 'label', 'meta_title', 'meta_description'];
}
