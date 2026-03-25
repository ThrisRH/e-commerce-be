<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AttributeSeeder extends Seeder
{
    public function run(): void
    {
        $attributes = [
            // General
            ['name' => 'Color', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'Warranty', 'data_type' => 'integer', 'unit' => 'Month', 'is_filterable' => true],
            ['name' => 'Weight', 'data_type' => 'float', 'unit' => 'kg', 'is_filterable' => false],
            ['name' => 'Operating System', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],

            // CPU (Processor)
            ['name' => 'CPU Series', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'CPU Cores', 'data_type' => 'integer', 'unit' => 'Cores', 'is_filterable' => true],
            ['name' => 'CPU Threads', 'data_type' => 'integer', 'unit' => 'Threads', 'is_filterable' => true],
            ['name' => 'Base Clock', 'data_type' => 'float', 'unit' => 'GHz', 'is_filterable' => false],
            ['name' => 'Boost Clock', 'data_type' => 'float', 'unit' => 'GHz', 'is_filterable' => false],
            ['name' => 'CPU Socket', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'CPU Cache', 'data_type' => 'integer', 'unit' => 'MB', 'is_filterable' => false],
            ['name' => 'TDP', 'data_type' => 'integer', 'unit' => 'W', 'is_filterable' => true],

            // GPU (Graphics Card)
            ['name' => 'GPU Chipset', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'VRAM Capacity', 'data_type' => 'integer', 'unit' => 'GB', 'is_filterable' => true],
            ['name' => 'VRAM Type', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'GPU Interface', 'data_type' => 'string', 'unit' => null, 'is_filterable' => false],

            // RAM (Memory)
            ['name' => 'RAM Capacity', 'data_type' => 'integer', 'unit' => 'GB', 'is_filterable' => true],
            ['name' => 'RAM Speed', 'data_type' => 'integer', 'unit' => 'MHz', 'is_filterable' => true],
            ['name' => 'RAM Type', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'RAM Slots', 'data_type' => 'integer', 'unit' => 'Slots', 'is_filterable' => false],

            // Storage (SSD/HDD)
            ['name' => 'Storage Capacity', 'data_type' => 'integer', 'unit' => 'GB', 'is_filterable' => true],
            ['name' => 'Storage Type', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'Form Factor', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'Read Speed', 'data_type' => 'integer', 'unit' => 'MB/s', 'is_filterable' => false],
            ['name' => 'Write Speed', 'data_type' => 'integer', 'unit' => 'MB/s', 'is_filterable' => false],

            // Motherboard
            ['name' => 'Motherboard Chipset', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'Form Factor (Mobo)', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],

            // Monitor / Display
            ['name' => 'Screen Size', 'data_type' => 'float', 'unit' => 'inch', 'is_filterable' => true],
            ['name' => 'Resolution', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
            ['name' => 'Refresh Rate', 'data_type' => 'integer', 'unit' => 'Hz', 'is_filterable' => true],
            ['name' => 'Response Time', 'data_type' => 'integer', 'unit' => 'ms', 'is_filterable' => false],
            ['name' => 'Panel Type', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],

            // PSU (Power Supply)
            ['name' => 'Wattage', 'data_type' => 'integer', 'unit' => 'W', 'is_filterable' => true],
            ['name' => 'Efficiency Rating', 'data_type' => 'string', 'unit' => null, 'is_filterable' => true],
        ];

        foreach ($attributes as $attribute) {
            $attribute['slug'] = Str::slug($attribute['name']);

            echo "Creating: {$attribute['name']} (slug: {$attribute['slug']})\n";

            Attribute::create($attribute);
        }
    }
}
