<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = category::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
            'image_url' => $this->faker->imageUrl,
            'sort_order' => $this->faker->numberBetween(1, 100),
            'is_active' => $this->faker->boolean,
        ];
    }
}