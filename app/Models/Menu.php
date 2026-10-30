<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Sources that can fill a submenu automatically
    public const AUTO_CHILDREN = [
        'gallery_albums' => 'Gallery albums (active albums, newest first)',
    ];

    protected $fillable = ['parent_id', 'title', 'page_id', 'url', 'auto_children', 'new_tab', 'status', 'serial'];

    protected $casts = [
        'new_tab' => 'boolean',
        'status'  => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('serial')->orderBy('id');
    }

    public function page()
    {
        return $this->belongsTo(ServicePage::class, 'page_id');
    }

    // Submenu shown on the website: manual children followed by any auto-generated ones
    public function navChildren()
    {
        $auto = match ($this->auto_children) {
            'gallery_albums' => Gallery::where('status', 'active')->orderBy('id', 'desc')->get()
                ->map(fn ($album) => new Menu(['title' => $album->title, 'url' => $album->url])),
            default => collect(),
        };

        return $this->children->concat($auto);
    }

    // Resolved href: linked page first, then custom URL (relative paths become absolute site URLs)
    public function getLinkAttribute(): string
    {
        if ($this->page) {
            return $this->page->url;
        }

        $url = trim((string) $this->url);

        if ($url === '' || $url === '#') {
            return '#';
        }

        if (preg_match('~^([a-z][a-z0-9+.-]*:|//|#)~i', $url)) {
            return $url; // absolute (http:, mailto:, tel:), protocol-relative or fragment-only
        }

        return url($url);
    }

    // True when the link points at the page currently being viewed (fragment ignored)
    public function isCurrent(): bool
    {
        $link = $this->link;

        if ($link === '#' || str_starts_with($link, '#')) {
            return false;
        }

        if (parse_url($link, PHP_URL_HOST) && parse_url($link, PHP_URL_HOST) !== request()->getHost()) {
            return false;
        }

        return trim((string) parse_url($link, PHP_URL_PATH), '/') === trim(request()->path(), '/');
    }
}
