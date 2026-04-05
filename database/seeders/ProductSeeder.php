<?php

namespace Database\Seeders;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Product\Models\Product;
use App\Containers\CatalogSection\Product\Models\ProductAttribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing products and their attributes to avoid unique constraint violations
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('product_attributes')->truncate();
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Cache brands and categories for performance
        $brands = Brand::all()->pluck('id', 'name');
        $categories = Category::all()->pluck('id', 'slug');
        $attributes = Attribute::all()->pluck('id', 'slug');

        $productsData = [
            // --- Laptop Officeworks ---
            [
                'name' => 'MacBook Air M2 2023',
                'brand' => 'Apple',
                'category_slug' => 'laptop-officeworks',
                'price' => 28990000,
                'description' => 'Siêu mỏng nhẹ, chip M2 cực mạnh.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook-air-m3-15-inch-2024_1__3_2.png',
                'attributes' => [
                    'color' => 'Midnight', 'warranty' => '12', 'weight' => '1.24', 'operating-system' => 'macOS',
                    'cpu-series' => 'Apple M2', 'ram-capacity' => '8', 'storage-capacity' => '256', 'screen-size' => '13.6', 'resolution' => 'Liquid Retina',
                ],
            ],
            [
                'name' => 'Dell XPS 13 9315',
                'brand' => 'Dell',
                'category_slug' => 'laptop-officeworks',
                'price' => 24500000,
                'description' => 'Thiết kế sang trọng, màn hình vô cực.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_11__6.png',
                'attributes' => [
                    'color' => 'Sky Blue', 'warranty' => '12', 'weight' => '1.17', 'operating-system' => 'Windows 11',
                    'cpu-series' => 'Core i5-1230U', 'ram-capacity' => '16', 'storage-capacity' => '512', 'screen-size' => '13.4', 'resolution' => 'FHD+',
                ],
            ],
            [
                'name' => 'HP Envy 13-bf0114TU',
                'brand' => 'HP',
                'category_slug' => 'laptop-officeworks',
                'price' => 21990000,
                'description' => 'Màn hình OLED 2.8K, làm việc chuyên nghiệp.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_3_78.png',
                'attributes' => [
                    'color' => 'Silver', 'warranty' => '12', 'weight' => '1.30', 'operating-system' => 'Windows 11',
                    'cpu-series' => 'Core i7-1250U', 'ram-capacity' => '16', 'storage-capacity' => '512', 'screen-size' => '13.3', 'resolution' => '2.8K OLED',
                ],
            ],

            // --- Laptop Gaming ---
            [
                'name' => 'ASUS ROG Zephyrus G14 2024',
                'brand' => 'Asus',
                'category_slug' => 'laptop-gaming',
                'price' => 45990000,
                'description' => 'Laptop gaming 14 inch mạnh nhất thế giới.',
                'image_url' => 'https://lapvip.vn/upload/products/thumb_350x0/asus-rog-zephyrus-g14-2024-1713175648.jpg',
                'attributes' => [
                    'color' => 'Eclipse Gray', 'warranty' => '24', 'weight' => '1.50', 'operating-system' => 'Windows 11',
                    'cpu-series' => 'Ryzen 9 8945HS', 'ram-capacity' => '32', 'storage-capacity' => '1024', 'screen-size' => '14.0', 'resolution' => '3K OLED',
                    'gpu-chipset' => 'RTX 4070', 'vram-capacity' => '8', 'refresh-rate' => '120',
                ],
            ],
            [
                'name' => 'MSI Katana 15 B13VFK',
                'brand' => 'MSI',
                'category_slug' => 'laptop-gaming',
                'price' => 26990000,
                'description' => 'Hiệu năng gaming thuần túy với card RTX 4060.',
                'image_url' => 'https://lapvip.vn/upload/products/thumb_630x0/msi-katana-15-b13vfk-2232us-1753951697.png',
                'attributes' => [
                    'color' => 'Black', 'warranty' => '24', 'weight' => '2.25', 'operating-system' => 'Windows 11',
                    'cpu-series' => 'Core i7-13620H', 'ram-capacity' => '16', 'storage-capacity' => '512', 'screen-size' => '15.6', 'resolution' => 'FHD',
                    'gpu-chipset' => 'RTX 4060', 'vram-capacity' => '8', 'refresh-rate' => '144',
                ],
            ],
            [
                'name' => 'Razer Blade 16 2024',
                'brand' => 'Razer',
                'category_slug' => 'laptop-gaming',
                'price' => 89990000,
                'description' => 'Đỉnh cao laptop gaming với màn hình Mini-LED.',
                'image_url' => 'https://lapvip.vn/upload/products/thumb_350x0/razer-blade-16-2024-1710757551.jpg',
                'attributes' => [
                    'color' => 'Black', 'warranty' => '12', 'weight' => '2.45', 'operating-system' => 'Windows 11',
                    'cpu-series' => 'Core i9-14900HX', 'ram-capacity' => '32', 'storage-capacity' => '2048', 'screen-size' => '16.0', 'resolution' => '4K Mini-LED',
                    'gpu-chipset' => 'RTX 4090', 'vram-capacity' => '16', 'refresh-rate' => '240',
                ],
            ],

            // --- CPUs ---
            [
                'name' => 'Intel Core i9-14900K', 'brand' => 'Intel', 'category_slug' => 'cpu', 'price' => 17500000, 'description' => 'Vua hiệu năng đa nhân.',
                'image_url' => 'https://product.hstatic.net/200000722513/product/n22360_png_36691178908b435494f526d804c4b249_master.png',
                'attributes' => ['cpu-series' => 'Core i9', 'cpu-cores' => '24', 'cpu-threads' => '32', 'base-clock' => '3.2', 'boost-clock' => '6.0', 'cpu-socket' => 'LGA 1700', 'cpu-cache' => '36', 'tdp' => '125'],
            ],
            [
                'name' => 'AMD Ryzen 7 7800X3D', 'brand' => 'AMD', 'category_slug' => 'cpu', 'price' => 10500000, 'description' => 'Vua chơi game với 3D V-Cache.',
                'image_url' => 'https://cdn.hstatic.net/products/200000722513/d6f05d43524a6c950830a366e4f4eb_2fb2daf9ef7d4faf92f0b1ed1612b1a0_master_2bcfeed7b07f464dae428580f9aa94b3_master.png',
                'attributes' => ['cpu-series' => 'Ryzen 7', 'cpu-cores' => '8', 'cpu-threads' => '16', 'base-clock' => '4.2', 'boost-clock' => '5.0', 'cpu-socket' => 'AM5', 'cpu-cache' => '96', 'tdp' => '120'],
            ],
            [
                'name' => 'Intel Core i5-13400F', 'brand' => 'Intel', 'category_slug' => 'cpu', 'price' => 5200000, 'description' => 'CPU quốc dân hiệu năng ổn định.',
                'image_url' => 'https://product.hstatic.net/200000722513/product/box-t4-i5f-13th-right-1080x1080pixels_1b54165ec2cc4ff1a0b964ffa582cfed_cc992b94f1524dabad02ce131c54fdcd_master.png',
                'attributes' => ['cpu-series' => 'Core i5', 'cpu-cores' => '10', 'cpu-threads' => '16', 'base-clock' => '2.5', 'boost-clock' => '4.6', 'cpu-socket' => 'LGA 1700', 'cpu-cache' => '20', 'tdp' => '65'],
            ],

            // --- GPUs (VGA) ---
            [
                'name' => 'ASUS ROG Strix RTX 4080 Super', 'brand' => 'Asus', 'category_slug' => 'gpu', 'price' => 38990000, 'description' => 'Sức mạnh đồ họa đỉnh cao.',
                'image_url' => 'https://product.hstatic.net/200000722513/product/h732_23dca022190446ea953a892a0e13d47d_c29c0f6cc8d948b5a3788f20cef4f61c_master.png',
                'attributes' => ['gpu-chipset' => 'RTX 4080 Super', 'vram-capacity' => '16', 'vram-type' => 'GDDR6X', 'gpu-interface' => 'PCIe 4.0'],
            ],
            [
                'name' => 'Gigabyte GeForce RTX 4060 AORUS ELITE', 'brand' => 'Gigabyte', 'category_slug' => 'gpu', 'price' => 9990000, 'description' => 'Sự lựa chọn hoàn hảo cho 1080p.',
                'image_url' => 'https://product.hstatic.net/200000722513/product/z4467057646459_c5555ee5e0ca7d7a974f9c22caf36600_c024558efe314a0b9b95159a6fb94d03_master.jpg',
                'attributes' => ['gpu-chipset' => 'RTX 4060', 'vram-capacity' => '8', 'vram-type' => 'GDDR6', 'gpu-interface' => 'PCIe 4.0'],
            ],
            [
                'name' => 'MSI RTX 4070 SUPER Gaming X Slim', 'brand' => 'MSI', 'category_slug' => 'gpu', 'price' => 20500000, 'description' => 'Hiệu năng mạnh mẽ với thiết kế mỏng nhẹ.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/6/3/63_1_3.png',
                'attributes' => ['gpu-chipset' => 'RTX 4070 Super', 'vram-capacity' => '12', 'vram-type' => 'GDDR6X', 'gpu-interface' => 'PCIe 4.0'],
            ],

            // --- RAM (Memory) ---
            [
                'name' => 'Corsair Vengeance RGB 32GB DDR5', 'brand' => 'Corsair', 'category_slug' => 'ram', 'price' => 3450000, 'description' => 'Ram DDR5 tốc độ cao với RGB.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/r/a/ram-corsair-vengeance-rgb-ddr5-5600mhz-32gb_2_.png',
                'attributes' => ['ram-capacity' => '32', 'ram-speed' => '6000', 'ram-type' => 'DDR5', 'ram-slots' => '2'],
            ],
            [
                'name' => 'G.Skill Trident Z5 RGB 32GB', 'brand' => 'G.Skill', 'category_slug' => 'ram', 'price' => 3800000, 'description' => 'Thiết kế sang trọng, tối ưu cho Intel.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/5/_/5.13.4.png',
                'attributes' => ['ram-capacity' => '32', 'ram-speed' => '6400', 'ram-type' => 'DDR5', 'ram-slots' => '2'],
            ],
            [
                'name' => 'Kingston FURY Beast 16GB DDR4', 'brand' => 'Kingston', 'category_slug' => 'ram', 'price' => 1250000, 'description' => 'Ram DDR4 ổn định nhất.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/4/_/4_44_27.jpg',
                'attributes' => ['ram-capacity' => '16', 'ram-speed' => '3200', 'ram-type' => 'DDR4', 'ram-slots' => '2'],
            ],

            // --- SSD/HDD ---
            [
                'name' => 'Samsung 990 Pro 1TB', 'brand' => 'Samsung', 'category_slug' => 'ssd', 'price' => 3200000, 'description' => 'SSD nhanh nhất hiện nay.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_2__10_38.png',
                'attributes' => ['storage-capacity' => '1024', 'storage-type' => 'NVMe Gen 4', 'form-factor' => 'M.2 2280', 'read-speed' => '7450', 'write-speed' => '6900'],
            ],
            [
                'name' => 'Crucial P3 Plus 2TB', 'brand' => 'Crucial', 'category_slug' => 'ssd', 'price' => 3100000, 'description' => 'Dung lượng lớn, tốc độ ổn định.',
                'image_url' => 'https://lh3.googleusercontent.com/HTTxoe6NVuq_Huq2Em3lWUstEnCKvZpLvx-2H1DAibiPpAQ5hfXv1H56meLPiIpFRTFuyrwYr801g9tpKLze2xRnUtj5DlJK=w500-rw',
                'attributes' => ['storage-capacity' => '2048', 'storage-type' => 'NVMe Gen 4', 'form-factor' => 'M.2 2280', 'read-speed' => '5000', 'write-speed' => '4200'],
            ],
            [
                'name' => 'Western Digital Blue 4TB HDD', 'brand' => 'Western Digital', 'category_slug' => 'hdd', 'price' => 2450000, 'description' => 'Lưu trữ dữ liệu an toàn.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/_/t_i_xu_ng_-_2023-01-28t233115.220.png',
                'attributes' => ['storage-capacity' => '4096', 'storage-type' => 'SATA III', 'form-factor' => '3.5 inch', 'read-speed' => '180', 'write-speed' => '150'],
            ],

            // --- Mainboard ---
            [
                'name' => 'ASUS ROG MAXIMUS Z790 HERO', 'brand' => 'Asus', 'category_slug' => 'mainboard', 'price' => 17900000, 'description' => 'Mainboard cao cấp nhất cho Intel.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_-_2024-09-08t145406.656.png',
                'attributes' => ['motherboard-chipset' => 'Z790', 'cpu-socket' => 'LGA 1700', 'ram-slots' => '4', 'form-factor-mobo' => 'ATX'],
            ],
            [
                'name' => 'Gigabyte B760M AORUS ELITE', 'brand' => 'Gigabyte', 'category_slug' => 'mainboard', 'price' => 4500000, 'description' => 'Mainboard mATX hiệu năng cực tốt.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/mainboard-gigabyte-b760m-aorus-elite-ddr5_5_.png',
                'attributes' => ['motherboard-chipset' => 'B760', 'cpu-socket' => 'LGA 1700', 'ram-slots' => '4', 'form-factor-mobo' => 'mATX'],
            ],
            [
                'name' => 'MSI MAG B650 TOMAHAWK WIFI', 'brand' => 'MSI', 'category_slug' => 'mainboard', 'price' => 5900000, 'description' => 'Lựa chọn hàng đầu cho AMD AM5.',
                'image_url' => 'https://nguyencongpc.vn/media/product/250-23895-1024--3-.png',
                'attributes' => ['motherboard-chipset' => 'B650', 'cpu-socket' => 'AM5', 'ram-slots' => '4', 'form-factor-mobo' => 'ATX'],
            ],

            // --- PSU ---
            [
                'name' => 'Corsair RM850e 850W Gold', 'brand' => 'Corsair', 'category_slug' => 'psu', 'price' => 3150000, 'description' => 'Nguồn 80 Plus Gold tin cậy.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/n/g/nguon-may-tinh-corsair-rm850e-850w-atx-3-0-80plus-gold-full-modular_7_.png',
                'attributes' => ['wattage' => '850', 'efficiency-rating' => '80 Plus Gold'],
            ],
            [
                'name' => 'Seasonic Focus GX-1000 1000W', 'brand' => 'Seasonic', 'category_slug' => 'psu', 'price' => 4800000, 'description' => 'Công suất lớn cho dàn máy cao cấp.',
                'image_url' => 'https://hoanghapccdn.com/media/product/472_seasonic_focus_fm_gold_1000_1_optimized.jpg',
                'attributes' => ['wattage' => '1000', 'efficiency-rating' => '80 Plus Gold'],
            ],
            [
                'name' => 'DeepCool PK550D 550W', 'brand' => 'DeepCool', 'category_slug' => 'psu', 'price' => 1150000, 'description' => 'Nguồn quốc dân cho máy cỏ.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/_/0/_0004_06.jpg',
                'attributes' => ['wattage' => '550', 'efficiency-rating' => '80 Plus Bronze'],
            ],

            // --- Monitors ---
            [
                'name' => 'LG UltraGear 27GR95QE-B', 'brand' => 'Samsung', 'category_slug' => 'monitor', 'price' => 24900000, 'description' => 'Màn hình OLED 240Hz cực đỉnh.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/man-hinh-lg-ultragear-oled-27gr95qe-b-27-inch-1.png',
                'attributes' => ['screen-size' => '27', 'resolution' => '2K (2560x1440)', 'refresh-rate' => '240', 'response-time' => '0.03', 'panel-type' => 'OLED'],
            ],
            [
                'name' => 'ASUS ROG Swift PG32UCDM', 'brand' => 'Asus', 'category_slug' => 'monitor', 'price' => 36900000, 'description' => 'Màn hình 4K OLED đỉnh nhất hiện nay.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/t/e/text_ng_n_2__9_237.png',
                'attributes' => ['screen-size' => '31.5', 'resolution' => '4K (3840x2160)', 'refresh-rate' => '240', 'response-time' => '0.03', 'panel-type' => 'QD-OLED'],
            ],
            [
                'name' => 'Dell UltraSharp U2723QE', 'brand' => 'Dell', 'category_slug' => 'monitor', 'price' => 14500000, 'description' => 'Màn hình làm đồ họa cân mọi dải màu.',
                'image_url' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/5/4/54_1_20.jpg',
                'attributes' => ['screen-size' => '27', 'resolution' => '4K (3840x2160)', 'refresh-rate' => '60', 'response-time' => '5', 'panel-type' => 'IPS Black'],
            ],

            // --- Case ---
            [
                'name' => 'NZXT H9 Flow White', 'brand' => 'NZXT', 'category_slug' => 'case', 'price' => 3850000, 'description' => 'Vỏ case bể cá quốc dân.',
                'image_url' => 'https://product.hstatic.net/200000722513/product/1672294349-h9-flow-hero-white_1daefd3b5bd546e4a6c92d8e77a38dc0_178ddf8389084ae38dc2d4f4f7184851_master.png',
                'attributes' => ['color' => 'White', 'form-factor' => 'Mid Tower', 'warranty' => '24'],
            ],
            [
                'name' => 'Lian Li PC-O11 Dynamic', 'brand' => 'Lian Li', 'category_slug' => 'case', 'price' => 3200000, 'description' => 'Huyền thoại vỏ case cao cấp.',
                'image_url' => 'https://product.hstatic.net/200000722513/product/04_9c3001f6d6d04afe9df3ee57698167ca_877399f708cd4eee88539d3577d95f53_master.jpg',
                'attributes' => ['color' => 'Black', 'form-factor' => 'Mid Tower', 'warranty' => '12'],
            ],
            [
                'name' => 'Corsair 4000D Airflow', 'brand' => 'Corsair', 'category_slug' => 'case', 'price' => 2450000, 'description' => 'Case airflow tốt nhất tầm giá.',
                'image_url' => 'https://product.hstatic.net/200000722513/product/cc-9011291-ww_01__1__0a6064cc137446a6be8f25cc4a2645fd_master.png',
                'attributes' => ['color' => 'Black', 'form-factor' => 'Mid Tower', 'warranty' => '24'],
            ],
        ];

        foreach ($productsData as $data) {
            $brandId = $brands[$data['brand']] ?? $brands->first();
            $categoryId = Category::where('slug', $data['category_slug'])->first()?->id;

            if (! $categoryId) {
                continue;
            }

            $product = Product::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']).'-'.rand(100, 999), // Add random to avoid slug conflict if any
                'description' => $data['description'],
                'price' => $data['price'],
                'image_url' => $data['image_url'],
                'stock' => rand(10, 50),
                'is_active' => true,
                'brand_id' => $brandId,
                'category_id' => $categoryId,
            ]);

            foreach ($data['attributes'] as $attrSlug => $value) {
                if (isset($attributes[$attrSlug])) {
                    ProductAttribute::create([
                        'product_id' => $product->id,
                        'attribute_id' => $attributes[$attrSlug],
                        'value' => $value,
                    ]);
                }
            }
        }
    }
}
