<?php

namespace Database\Factories;

use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeFactory extends Factory
{
    protected $model = Attribute::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'data_type' => $this->faker->randomElement(['string', 'integer', 'float', 'boolean']),
            'unit' => $this->faker->optional()->word,
            'is_filterable' => $this->faker->boolean,
            'is_required' => $this->faker->boolean,
        ];
    }
}
