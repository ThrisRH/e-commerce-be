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
            // Laptops
            [
                'name' => 'ASUS ROG Zephyrus G14',
                'brand_id' => $brands['Asus'],
                'category_id' => $categories['Laptop Gaming'],
                'price' => 38990000,
                'description' => 'Powerful compact gaming laptop with AMD Ryzen 9 and NVIDIA RTX 4070.',
                'image_url' => 'https://rog.asus.com/media/g14_banner.jpg',
            ],
            [
                'name' => 'MSI Raider GE78 HX',
                'brand_id' => $brands['MSI'],
                'category_id' => $categories['Laptop Gaming'],
                'price' => 104990000,
                'description' => 'High-end gaming laptop with Intel Core i9-13980HX.',
                'image_url' => 'https://msi.com/media/raider_banner.jpg',
            ],
            [
                'name' => 'Acer Nitro V 15',
                'brand_id' => $brands['Acer'],
                'category_id' => $categories['Laptop Gaming'],
                'price' => 21990000,
                'description' => 'Budget friendly gaming laptop with RTX 4050.',
                'image_url' => 'https://acer.com/media/nitro_banner.jpg',
            ],

            // CPUs
            [
                'name' => 'Intel Core i9-14900K',
                'brand_id' => $brands['Intel'],
                'category_id' => $categories['CPU'],
                'price' => 19990000,
                'description' => '24 cores (8P+16E) up to 6.0 GHz.',
                'image_url' => 'https://intel.com/media/i9_banner.jpg',
            ],
            [
                'name' => 'AMD Ryzen 7 7800X3D',
                'brand_id' => $brands['AMD'],
                'category_id' => $categories['CPU'],
                'price' => 11990000,
                'description' => 'The best gaming CPU with 3D V-Cache technology.',
                'image_url' => 'https://amd.com/media/ryzen_banner.jpg',
            ],

            // GPUs
            [
                'name' => 'ASUS ROG Strix GeForce RTX 4090',
                'brand_id' => $brands['Asus'],
                'category_id' => $categories['GPU'],
                'price' => 64990000,
                'description' => 'Ultimate graphics card for 4K gaming.',
                'image_url' => 'https://rog.asus.com/media/rtx4090_banner.jpg',
            ],
            [
                'name' => 'MSI Gaming X Slim GeForce RTX 4080 Super',
                'brand_id' => $brands['MSI'],
                'category_id' => $categories['GPU'],
                'price' => 27990000,
                'description' => 'High performance slim GPU.',
                'image_url' => 'https://msi.com/media/rtx4080_banner.jpg',
            ],
            [
                'name' => 'Gigabyte Radeon RX 7900 XTX Gaming OC',
                'brand_id' => $brands['Gigabyte'],
                'category_id' => $categories['GPU'],
                'price' => 23990000,
                'description' => 'Top tier AMD GPU with 24GB VRAM.',
                'image_url' => 'https://gigabyte.com/media/rx7900_banner.jpg',
            ],

            // Mainboards
            [
                'name' => 'ASUS ROG CROSSHAIR X670E HERO',
                'brand_id' => $brands['Asus'],
                'category_id' => $categories['Mainboard'],
                'price' => 18990000,
                'description' => 'Premium AM5 motherboard for Ryzen 7000/8000 series.',
                'image_url' => 'https://rog.asus.com/media/x670e_banner.jpg',
            ],
            [
                'name' => 'MSI MAG Z790 TOMAHAWK WIFI',
                'brand_id' => $brands['MSI'],
                'category_id' => $categories['Mainboard'],
                'price' => 6990000,
                'description' => 'Robust and reliable Z790 motherboard.',
                'image_url' => 'https://msi.com/media/z790_banner.jpg',
            ],

            // RAM
            [
                'name' => 'Corsair Vengeance RGB 32GB (2x16GB) DDR5 6000MHz',
                'brand_id' => $brands['Corsair'],
                'category_id' => $categories['RAM'],
                'price' => 3990000,
                'description' => 'High-performance DDR5 memory with RGB lighting.',
                'image_url' => 'https://corsair.com/media/ram_banner.jpg',
            ],
            [
                'name' => 'G.Skill Trident Z5 RGB 32GB (2x16GB) DDR5 6400MHz',
                'brand_id' => $brands['G.Skill'],
                'category_id' => $categories['RAM'],
                'price' => 4290000,
                'description' => 'Extreme performance DDR5 RAM.',
                'image_url' => 'https://gskill.com/media/ram_banner.jpg',
            ],

            // Storage
            [
                'name' => 'Samsung 990 Pro 2TB NVMe SSD',
                'brand_id' => $brands['Samsung'],
                'category_id' => $categories['SSD'],
                'price' => 5490000,
                'description' => 'Blazing fast PCIe 4.0 NVMe SSD.',
                'image_url' => 'https://samsung.com/media/990pro_banner.jpg',
            ],
            [
                'name' => 'Western Digital WD Black SN850X 1TB',
                'brand_id' => $brands['Western Digital'],
                'category_id' => $categories['SSD'],
                'price' => 2990000,
                'description' => 'Great gaming SSD with high speeds.',
                'image_url' => 'https://wdc.com/media/sn850x_banner.jpg',
            ],

            // Peripherals
            [
                'name' => 'Logitech G Pro X Superlight 2',
                'brand_id' => $brands['Logitech'],
                'category_id' => $categories['Mouse'],
                'price' => 5490000,
                'description' => 'Ultra-lightweight wireless gaming mouse.',
                'image_url' => 'https://logitechg.com/media/superlight_banner.jpg',
            ],
            [
                'name' => 'Razer Huntsman V3 Pro',
                'brand_id' => $brands['Razer'],
                'category_id' => $categories['Keyboard'],
                'price' => 8990000,
                'description' => 'Analog optical gaming keyboard.',
                'image_url' => 'https://razer.com/media/huntsman_banner.jpg',
            ],
            [
                'name' => 'Sony INZONE H9 Wireless Gaming Headset',
                'brand_id' => $brands['Sony'],
                'category_id' => $categories['Headset'],
                'price' => 10990000,
                'description' => 'Premium wireless noise-cancelling headset.',
                'image_url' => 'https://sony.com/media/headset_banner.jpg',
            ],

            // Components & PSU
            [
                'name' => 'Seasonic PRIME TX-1600 1600W Titanium',
                'brand_id' => $brands['Seasonic'],
                'category_id' => $categories['PSU'],
                'price' => 13990000,
                'description' => 'Ultimate 1600W 80 PLUS Titanium PSU.',
                'image_url' => 'https://seasonic.com/media/psu_banner.jpg',
            ],
            [
                'name' => 'NZXT H9 Elite',
                'brand_id' => $brands['NZXT'],
                'category_id' => $categories['Case'],
                'price' => 6990000,
                'description' => 'Stunning dual-chamber mid-tower case.',
                'image_url' => 'https://nzxt.com/media/case_banner.jpg',
            ],
            [
                'name' => 'Noctua NH-D15 chromax.black',
                'brand_id' => $brands['Noctua'],
                'category_id' => $categories['Cooling'],
                'price' => 2990000,
                'description' => 'Flagship black dual-tower CPU cooler.',
                'image_url' => 'https://noctua.at/media/cooler_banner.jpg',
            ],
        ];

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
