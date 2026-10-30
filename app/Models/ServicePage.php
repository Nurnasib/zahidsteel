<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    // type => URL section, e.g. a "product" page lives at /products/{key}
    public const TYPES = [
        'service' => 'services',
        'product' => 'products',
        'page'    => 'pages',
    ];

    public const TYPE_LABELS = [
        'service' => 'Service',
        'product' => 'Product',
        'page'    => 'General Page',
    ];

    protected $fillable = ['key', 'type', 'title', 'subtitle', 'meta_title', 'meta_description', 'blocks', 'image', 'gallery', 'body'];

    public function menus()
    {
        return $this->hasMany(Menu::class, 'page_id');
    }

    public function getUrlAttribute(): string
    {
        return route('page.show', [self::TYPES[$this->type] ?? 'pages', $this->key]);
    }
}
