<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\ServicePage;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        // Menu items link to these pages, so make sure they exist first (both seeders skip existing pages)
        $this->call([ServicePageSeeder::class, ProductPageSeeder::class]);

        // Seed only an empty menu, so re-seeding never overwrites what admins built
        if (Menu::exists()) {
            return;
        }

        foreach ($this->items() as $topSerial => $top) {
            $parent = Menu::create($this->attributes($top, null, $topSerial + 1));

            foreach ($top['children'] ?? [] as $childSerial => $child) {
                Menu::create($this->attributes($child, $parent->id, $childSerial + 1));
            }
        }
    }

    private function attributes(array $item, ?int $parentId, int $serial): array
    {
        $page = isset($item['page']) ? ServicePage::where('key', $item['page'])->first() : null;

        return [
            'parent_id' => $parentId,
            'title'     => $item['title'],
            'page_id'   => $page?->id,
            'url'       => $page ? null : ($item['url'] ?? '#'),
            'auto_children' => $item['auto_children'] ?? null,
            'new_tab'   => $item['new_tab'] ?? false,
            'status'    => true,
            'serial'    => $serial,
        ];
    }

    // The header menu as it was hard-coded before it became admin-managed (Gallery's placeholder submenu replaced by albums)
    private function items(): array
    {
        return [
            ['title' => 'Home', 'url' => '/'],
            ['title' => 'About Us', 'url' => '/about-us', 'children' => [
                ['title' => 'Company Profile', 'url' => '/about-us#s1'],
                ['title' => 'Our History', 'url' => '/about-us#s3'],
                ['title' => 'Our Mission & Vision', 'url' => '/about-us#s2'],
                ['title' => 'Why Choose Us', 'url' => '/about-us#s4'],
                ['title' => 'Quality Policy', 'url' => '/about-us#s5'],
                ['title' => 'Factory & Facilities', 'url' => '/about-us#s7'],
                ['title' => 'Certifications', 'url' => '/client-list'],
            ]],
            ['title' => 'Services', 'page' => 'design', 'children' => [
                ['title' => 'Design', 'page' => 'design'],
                ['title' => 'Erection', 'page' => 'erection'],
                ['title' => 'Fabrication', 'page' => 'fabrication'],
                ['title' => 'Supply', 'page' => 'supply'],
            ]],
            ['title' => 'Products', 'page' => 'steel-structure', 'children' => [
                ['title' => 'Highway Guard Rail Systems', 'url' => 'https://industrialrackbd.com/guardrail/', 'new_tab' => true],
                ['title' => 'Steel Structures', 'page' => 'steel-structure'],
                ['title' => 'Road Safety Products', 'page' => 'road-safety'],
                ['title' => 'Custom Fabrication', 'page' => 'custom-fabrication'],
                ['title' => 'Industrial Rack', 'url' => 'https://industrialrackbd.com'],
                ['title' => 'Industrial Furniture', 'url' => 'https://industrialrackbd.com/industrial-furniture/', 'new_tab' => true],
            ]],
            ['title' => 'Our Projects', 'url' => '/complete-project', 'children' => [
                ['title' => 'Running Projects', 'url' => '/running-project'],
                ['title' => 'Completed Projects', 'url' => '/complete-project'],
            ]],
            ['title' => 'Manufacturing', 'url' => '/complete-project', 'children' => [
                ['title' => 'Production Process', 'url' => '/running-project'],
                ['title' => 'Quality Control', 'url' => '/complete-project'],
            ]],
            ['title' => 'Clients', 'url' => '/gallery'],
            ['title' => 'Gallery', 'url' => '/gallery', 'auto_children' => 'gallery_albums'], // submenu = active albums
            ['title' => 'News & Events', 'url' => '/blog'],
            ['title' => 'Careers', 'url' => 'media-coverage/index.html'],
            ['title' => 'Contact us', 'url' => '/contact-us'],
        ];
    }
}
