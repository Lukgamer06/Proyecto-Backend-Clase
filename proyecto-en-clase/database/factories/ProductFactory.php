<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;    

    public function definition(): array
    {
        return [
        'name' => $this->faker->word(),
        'description' => $this->faker->sentence(),
        'category_id' => Category::inRandomOrder()->first()->id,
        'image_url' => $this->faker->imageUrl(),
        'price' => $this->faker->randomFloat(2, 10, 1000),
        'stock' => $this->faker->numberBetween(0, 100)
        ];
    }
}
