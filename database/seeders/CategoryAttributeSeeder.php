<?php

namespace Database\Seeders;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Containers\CatalogSection\Category\Models\Category;
use Illuminate\Database\Seeder;

class CategoryAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define attribute sets for each category according to seeder_tuto.md
        $laptopOfficeworksSlugs = [
            'color',
            'warranty',
            'weight',
            'operating-system',
            'cpu-series',
            'ram-capacity',
            'storage-capacity',
            'screen-size',
            'resolution',
        ];

        $laptopGamingSlugs = array_merge($laptopOfficeworksSlugs, [
            'gpu-chipset',
            'vram-capacity',
            'refresh-rate',
        ]);

        $categoryAttributeMap = [
            'laptop-officeworks' => $laptopOfficeworksSlugs,
            'laptop-gaming' => $laptopGamingSlugs,
            'cpu' => [
                'cpu-series',
                'cpu-cores',
                'cpu-threads',
                'base-clock',
                'boost-clock',
                'cpu-socket',
                'cpu-cache',
                'tdp',
            ],
            'gpu' => [
                'gpu-chipset',
                'vram-capacity',
                'vram-type',
                'gpu-interface',
            ],
            'ram' => [
                'ram-capacity',
                'ram-speed',
                'ram-type',
                'ram-slots',
            ],
            'hdd' => [
                'storage-capacity',
                'storage-type',
                'form-factor',
                'read-speed',
                'write-speed',
            ],
            'vga' => [
                'gpu-chipset',
                'vram-capacity',
                'vram-type',
                'gpu-interface',
            ],
            'ssd' => [
                'storage-capacity',
                'storage-type',
                'form-factor',
                'read-speed',
                'write-speed',
            ],
            'mainboard' => [
                'motherboard-chipset',
                'cpu-socket',
                'ram-slots',
                'form-factor-mobo',
            ],
            'psu' => [
                'wattage',
                'efficiency-rating',
            ],
            'monitor' => [
                'screen-size',
                'resolution',
                'refresh-rate',
                'response-time',
                'panel-type',
            ],
            'case' => [
                'color',
                'form-factor',
                'warranty',
            ],
        ];

        foreach ($categoryAttributeMap as $categorySlug => $attributeSlugs) {
            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                $this->attachAttributes($category, $attributeSlugs);
            }
        }
    }

    /**
     * Helper method to dynamically fetch and attach attributes to a category.
     * Handles missing attributes gracefully and uses syncWithoutDetaching for safety.
     */
    private function attachAttributes(Category $category, array $attributeSlugs): void
    {
        // Dynamically fetch attribute IDs by their slugs
        $attributeIds = Attribute::whereIn('slug', $attributeSlugs)->pluck('id')->toArray();

        if (! empty($attributeIds)) {
            // Use syncWithoutDetaching to avoid breaking existing mappings
            $category->attributes()->syncWithoutDetaching($attributeIds);
        }
    }
}
