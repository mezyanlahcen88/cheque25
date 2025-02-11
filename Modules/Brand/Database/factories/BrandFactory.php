<?php

namespace Modules\Brand\database\factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Brand\App\Models\Brand::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'picture' => $this->faker->optional()->imageUrl(),
            'name' => $this->faker->word,
        ];
    }
}

