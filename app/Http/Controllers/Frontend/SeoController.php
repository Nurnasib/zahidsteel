<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\ServicePage;

class SeoController extends Controller
{
    // Built on each request so new pages, albums and posts appear without regenerating anything
    public function sitemap()
    {
        $urls = collect(['home', 'about-us', 'client.list', 'factory', 'complete-project', 'running-project', 'gallery', 'blog.index', 'contact-us'])
            ->map(fn ($name) => ['loc' => route($name), 'lastmod' => null]);

        foreach (ServicePage::orderBy('id')->get() as $page) {
            $urls->push(['loc' => $page->url, 'lastmod' => $page->updated_at]);
        }

        foreach (Gallery::where('status', 'active')->orderBy('id')->get() as $album) {
            $urls->push(['loc' => $album->url, 'lastmod' => $album->updated_at]);
        }

        foreach (Blog::where('status', 'active')->whereNotNull('slug')->orderBy('id')->get() as $blog) {
            $urls->push(['loc' => route('blog.details', $blog->slug), 'lastmod' => $blog->updated_at]);
        }

        return response()
            ->view('frontend.sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    // Served by Laravel (not a static file) so the sitemap link always uses the site's own domain
    public function robots()
    {
        return response("User-agent: *\nDisallow: /admin\n\nSitemap: " . route('sitemap') . "\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
