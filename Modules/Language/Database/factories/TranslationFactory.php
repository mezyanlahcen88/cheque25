<?php

namespace Modules\Language\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TranslationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Language\App\Models\Translation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [];
    }
}

