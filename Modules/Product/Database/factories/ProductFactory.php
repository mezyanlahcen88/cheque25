<?php

namespace Modules\Product\database\factories;

use Illuminate\Support\Str;
use Modules\Brand\App\Models\Brand;
use Modules\Category\App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Warehouse\App\Models\Warehouse;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Product\App\Models\Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        $categories = Category::where('parent_id','!=',null)->pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();
        $warehouses = Warehouse::pluck('id')->toArray();
        return [
                'picture' => $this->faker->optional()->imageUrl(),
                'reference' => $this->faker->unique()->bothify('REF-#####'),
                'name' => $this->faker->word,
                'description' => $this->faker->optional()->sentence,
                'product_type' => $this->faker->randomElement(['Typ eA', 'Type B', 'Type C']),
                'service' => $this->faker->randomElement(['Service 1', 'Service 2', 'Service 3']),
                'stock' => $this->faker->optional()->numberBetween(0, 1000),
                'stock_alert' => $this->faker->optional()->numberBetween(10, 100),
                'buy_unit' => $this->faker->randomElement(['Unit A', 'Unit B', 'Unit C']),
                'buy_price' => $this->faker->optional()->randomFloat(2, 0, 1000),
                'lot_number' => $this->faker->optional()->bothify('LOT-#####'),
                'date_of_expiration' => $this->faker->optional()->dateTimeBetween('now', '+2 years'),
                'destockage_unit' => $this->faker->randomElement(['Unit A', 'Unit B', 'Unit C']),
                'category_id' => $this->faker->randomElement($categories),
                'brand_id' =>$this->faker->randomElement($brands),
                'warehouse_id' => $this->faker->randomElement($warehouses),
                'iscomposable' => $this->faker->boolean,
                'isactive' => $this->faker->boolean,
                'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

