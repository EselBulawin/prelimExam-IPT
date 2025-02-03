<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => fake()->name(),
            'description' => $this->faker->sentence(),
            'category_id' => Category::factory(),
            'purchase_price' => $this->faker->randomFloat(2, 10, 100),
            'retail_price' => null,
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
