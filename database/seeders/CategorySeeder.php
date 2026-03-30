<?php

namespace Database\Seeders;

use App\Containers\CatalogSection\Category\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Laptop Officeworks',
            'slug' => 'laptop-officeworks',
            'description' => 'Laptop Officeworks for work and study',
            'image_url' => 'https://www.officeworks.com.au/images/brands/microsoft/surface-go-3/surface-go-3-hero-banner.jpg',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Laptop Gaming',
            'slug' => 'laptop-gaming',
            'description' => 'Laptop Gaming for gaming, graphic, development',
            'image_url' => 'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/44/333430/acer-nitro-v-15-anv15-41-r2up-r5-nhqpgsv004-638774737367845195-600x600.jpg',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'PC Parts',
            'slug' => 'pc-parts',
            'description' => 'PC Parts for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Mainboard',
            'slug' => 'mainboard',
            'description' => 'Mainboard for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'CPU',
            'slug' => 'cpu',
            'description' => 'CPU for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'RAM',
            'slug' => 'ram',
            'description' => 'RAM for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'HDD',
            'slug' => 'hdd',
            'description' => 'HDD for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'SSD',
            'slug' => 'ssd',
            'description' => 'SSD for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 5,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'GPU',
            'slug' => 'gpu',
            'description' => 'GPU for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 6,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'VGA',
            'slug' => 'vga',
            'description' => 'VGA for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 7,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'PSU',
            'slug' => 'psu',
            'description' => 'PSU for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 6,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Case',
            'slug' => 'case',
            'description' => 'Case for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 7,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Cooling',
            'slug' => 'cooling',
            'description' => 'Cooling for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 8,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Monitor',
            'slug' => 'monitor',
            'description' => 'Monitor for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 9,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Keyboard',
            'slug' => 'keyboard',
            'description' => 'Keyboard for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 10,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Mouse',
            'slug' => 'mouse',
            'description' => 'Mouse for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 11,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Headset',
            'slug' => 'headset',
            'description' => 'Headset for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 12,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Speaker',
            'slug' => 'speaker',
            'description' => 'Speaker for PC',
            'image_url' => 'https://brightstarcomp.com/cdn/shop/collections/PC_Parts_Collection.png?v=1725950962',
            'parent_id' => 3,
            'sort_order' => 15,
            'is_active' => true,
        ]);
    }
}
