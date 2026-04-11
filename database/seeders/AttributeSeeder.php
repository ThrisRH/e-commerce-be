<?php

namespace Database\Seeders;

use App\Containers\CatalogSection\Attribute\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            // General
            ['name' => 'Color', 'data_type' => 'string'],
            ['name' => 'Warranty', 'data_type' => 'integer'],
            ['name' => 'Weight', 'data_type' => 'float'],
            ['name' => 'Operating System', 'data_type' => 'string'],

            // CPU (Processor)
            ['name' => 'CPU Series', 'data_type' => 'string'],
            ['name' => 'CPU Cores', 'data_type' => 'integer'],
            ['name' => 'CPU Threads', 'data_type' => 'integer'],
            ['name' => 'Base Clock', 'data_type' => 'float'],
            ['name' => 'Boost Clock', 'data_type' => 'float'],
            ['name' => 'CPU Socket', 'data_type' => 'string'],
            ['name' => 'CPU Cache', 'data_type' => 'integer'],
            ['name' => 'TDP', 'data_type' => 'integer'],

            // GPU (Graphics Card)
            ['name' => 'GPU Chipset', 'data_type' => 'string'],
            ['name' => 'VRAM Capacity', 'data_type' => 'integer'],
            ['name' => 'VRAM Type', 'data_type' => 'string'],
            ['name' => 'GPU Interface', 'data_type' => 'string'],

            // RAM (Memory)
            ['name' => 'RAM Capacity', 'data_type' => 'integer'],
            ['name' => 'RAM Speed', 'data_type' => 'integer'],
            ['name' => 'RAM Type', 'data_type' => 'string'],
            ['name' => 'RAM Slots', 'data_type' => 'integer'],

            // Storage (SSD/HDD)
            ['name' => 'Storage Capacity', 'data_type' => 'integer'],
            ['name' => 'Storage Type', 'data_type' => 'string'],
            ['name' => 'Form Factor', 'data_type' => 'string'],
            ['name' => 'Read Speed', 'data_type' => 'integer'],
            ['name' => 'Write Speed', 'data_type' => 'integer'],

            // Motherboard
            ['name' => 'Motherboard Chipset', 'data_type' => 'string'],
            ['name' => 'Form Factor (Mobo)', 'data_type' => 'string'],

            // Monitor / Display
            ['name' => 'Screen Size', 'data_type' => 'float'],
            ['name' => 'Resolution', 'data_type' => 'string'],
            ['name' => 'Refresh Rate', 'data_type' => 'integer'],
            ['name' => 'Response Time', 'data_type' => 'integer'],
            ['name' => 'Panel Type', 'data_type' => 'string'],

            // PSU (Power Supply)
            ['name' => 'Wattage', 'data_type' => 'integer'],
            ['name' => 'Efficiency Rating', 'data_type' => 'string'],
        ];

        foreach ($attributes as $attribute) {
            $attribute['slug'] = Str::slug($attribute['name']);

            echo "Creating: {$attribute['name']} (slug: {$attribute['slug']})\n";

            Attribute::create($attribute);
        }
    }
}
