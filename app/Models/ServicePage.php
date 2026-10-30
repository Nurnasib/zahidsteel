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

    // Image for social shares: hero image, else the first block image
    public function shareImage(): ?string
    {
        $images = array_merge(
            [json_decode($this->image ?? '', true)],
            array_column(json_decode($this->blocks ?? '[]', true) ?: [], 'image')
        );

        foreach ($images as $img) {
            if (! empty($img)) {
                return asset($img['large'] ?? $img['original']);
            }
        }

        return null;
    }

    // Question/answer pairs from the body's FAQ section: an <h2> mentioning FAQ/Frequently Asked,
    // then <h3> questions each followed by answer paragraphs, up to the next <h2>
    public function faqs(): array
    {
        if (! trim((string) $this->body)) {
            return [];
        }

        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML('<?xml encoding="UTF-8"><div>' . $this->body . '</div>');
        libxml_clear_errors();

        $faqs    = [];
        $inFaq   = false;
        $current = null;

        foreach ($dom->getElementsByTagName('div')->item(0)->childNodes as $node) {
            if (! $node instanceof \DOMElement) {
                continue;
            }

            $text = trim(preg_replace('/\s+/u', ' ', $node->textContent));

            if ($node->tagName === 'h2') {
                $inFaq = (bool) preg_match('/frequently asked|\bfaqs?\b/i', $text);
                $current = null;
            } elseif ($inFaq && $node->tagName === 'h3') {
                $faqs[] = ['question' => $text, 'answer' => ''];
                $current = array_key_last($faqs);
            } elseif ($inFaq && $current !== null && $text !== '') {
                $faqs[$current]['answer'] = trim($faqs[$current]['answer'] . ' ' . $text);
            }
        }

        return array_values(array_filter($faqs, fn ($faq) => $faq['question'] !== '' && $faq['answer'] !== ''));
    }
}
