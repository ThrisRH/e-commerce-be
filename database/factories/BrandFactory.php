<?php

namespace Database\Factories;

use App\Models\brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    protected $model = brand::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug,
            'description' => $this->faker->text,
        ];
    }
}