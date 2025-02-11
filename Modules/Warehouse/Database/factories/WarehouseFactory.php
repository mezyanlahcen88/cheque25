<?php

namespace Modules\Warehouse\database\factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class WarehouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Warehouse\App\Models\Warehouse::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type' => $this->faker->randomElement(['type 1', 'type 2', 'type 3']),
            'address' => $this->faker->address,
        ];
    }
}

