<?php

namespace Database\Seeders;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Product\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $brands = Brand::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'name');

        $products = [

            // CPUs
            [
                'name' => 'Intel Core i9-14900K',
                'brand_id' => $brands['Intel'],
                'category_id' => $categories['CPU'],
                'price' => 19990000,
                'description' => '24 cores (8P+16E) up to 6.0 GHz.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/p/cpu-intel-core-i9-14900k_2_.png',
            ],
            [
                'name' => 'AMD Ryzen 7 7800X3D',
                'brand_id' => $brands['AMD'],
                'category_id' => $categories['CPU'],
                'price' => 11990000,
                'description' => 'The best gaming CPU with 3D V-Cache technology.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/c/p/cpu-amd-ryzen-7-7800x3d_2__3.png',
            ],

            // GPUs
            [
                'name' => 'ASUS ROG Strix GeForce RTX 4090',
                'brand_id' => $brands['Asus'],
                'category_id' => $categories['GPU'],
                'price' => 64990000,
                'description' => 'Ultimate graphics card for 4K gaming.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/v/g/vga_47_.png',
            ], ];

        foreach ($products as $item) {
            Product::create([
                'name' => $item['name'],
                'slug' => Str::slug($item['name']),
                'description' => $item['description'],
                'price' => $item['price'],
                'image_url' => $item['image_url'],
                'stock' => 10,
                'is_active' => true,
                'brand_id' => $item['brand_id'],
                'category_id' => $item['category_id'],
            ]);
        }
    }
}
