<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductProperty;

class ProductPropertySeeder extends Seeder
{
    public function run()
    {
        $products = Product::all();

        foreach ($products as $product) {
            ProductProperty::factory()->count(3)->create(['product_id' => $product->id]);
        }
    }
}
