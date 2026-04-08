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
            'image_url' => 'https://surfacecity.vn/wp-content/uploads/L713PL-front.jpg',
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
            'image_url' => 'https://cdn.hstatic.net/products/200000420363/40447_3_copy_c003ceb9365f4f058a68a54a96238424_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 1,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'CPU',
            'slug' => 'cpu',
            'description' => 'CPU for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/i3.9100f.cu_10f6255a3ea84fbd8e97ead911ea3cad_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 2,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'RAM',
            'slug' => 'ram',
            'description' => 'RAM for PC',
            'image_url' => 'https://cdn.hstatic.net/products/200000420363/t_i_xu_ng__100__e32fb978574047dba6a609748b17753c_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 3,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'HDD',
            'slug' => 'hdd',
            'description' => 'HDD for PC',
            'image_url' => 'https://cdn.hstatic.net/products/200000420363/t_i_xu_ng_-_2026-01-31t135252.682_c15b21824ed348c78612f54f6e859bf4_compact.png',
            'parent_id' => 3,
            'sort_order' => 4,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'SSD',
            'slug' => 'ssd',
            'description' => 'SSD for PC',
            'image_url' => 'https://cdn.hstatic.net/products/200000420363/kingston-a400-240gb-2_4694a0ea1c_3cfa129f8496439283ff8ae883f51724_compact.png',
            'parent_id' => 3,
            'sort_order' => 5,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'GPU',
            'slug' => 'gpu',
            'description' => 'GPU for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/gigabyte-gtx-1050ti-4g-cu-600x600_51aa3d243aad4c7ea9cee9e7bfdcecdd_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 6,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'PSU',
            'slug' => 'psu',
            'description' => 'PSU for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/nguon_xigmatek_600w_x-power_iii_x-650__en45990__d5b8aba83da3418d9108fc32cd74c05e_compact.png',
            'parent_id' => 3,
            'sort_order' => 6,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Case',
            'slug' => 'case',
            'description' => 'Case for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/bk2_3814d30fce4c4ba78cd1d44de907f44e_compact.png',
            'parent_id' => 3,
            'sort_order' => 7,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Cooler',
            'slug' => 'cooler',
            'description' => 'Cooler for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/fan-case-led-rgb-coolmoon-y2---deen_f867b8971edf4e43a9434d79eb95d769_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 8,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Monitor',
            'slug' => 'monitor',
            'description' => 'Monitor for PC',
            'image_url' => 'https://cdn.hstatic.net/products/200000420363/t_i_xu_ng_-_2026-01-27t153430.603_6cd49086e75e4ec28aefff1fd1319e8a_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 9,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Keyboard',
            'slug' => 'keyboard',
            'description' => 'Keyboard for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/_new_-anh-sp-web-recovered_df2ab36381d740ab945451e7b1a8e519_compact.png',
            'parent_id' => 3,
            'sort_order' => 10,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Mouse',
            'slug' => 'mouse',
            'description' => 'Mouse for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/1_953b62f3b78d4ad8931916a08438eaca_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 11,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Headphone',
            'slug' => 'headphone',
            'description' => 'Headphone for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/hp_du_eh416_rgb-600x600_759e38e805044c3882cdda7f45902bef_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 12,
            'is_active' => true,
        ]);

        Category::create([
            'name' => 'Speaker',
            'slug' => 'speaker',
            'description' => 'Speaker for PC',
            'image_url' => 'https://product.hstatic.net/200000420363/product/lo-edf-mr4-wh_d2e659852f55458499fa3121f8c8c99f_compact.jpg',
            'parent_id' => 3,
            'sort_order' => 15,
            'is_active' => true,
        ]);
    }
}
