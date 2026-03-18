<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $brands = [
            'Acer',
            'Asus',
            'Dell',
            'HP',
            'Lenovo',
            'MSI',
            'Razer',
            'Samsung',
            'Sony',
            'Toshiba',
            'Xiaomi',
            'Apple',
            'Microsoft',
            'Intel',
            'AMD',
            'NVIDIA',
            'Corsair',
            'Logitech',
            'Gigabyte',
            'ASRock',
            'Zotac',
            'EVGA',
            'Palit',
            'Galax',
            'PNY',
            'PowerColor',
            'Sapphire',
            'Cooler Master',
            'Thermaltake',
            'NZXT',
            'Noctua',
            'be quiet!',
            'Lian Li',
            'Phanteks',
            'Fractal Design',
            'Seasonic',
            'DeepCool',
            'Kingston',
            'Western Digital',
            'Seagate',
            'Crucial',
            'G.Skill',
            'TeamGroup',
            'Micron',
            'SK Hynix',
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
                'slug' => str()->slug($brand),
                'description' => $brand.' for PC',
            ]);
        }
    }
}
