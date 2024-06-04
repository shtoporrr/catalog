<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductProperty;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPropertyFactory extends Factory
{
    protected $model = ProductProperty::class;

    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'name' => $this->faker->randomElement(['Color', 'Size', 'Weight', 'Material']),
            'value' => $this->faker->word(),
        ];
    }
}
