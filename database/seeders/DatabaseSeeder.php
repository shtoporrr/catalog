<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductProperty;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Создание продуктов и их свойств
        Product::factory()
            ->count(10)
            ->has(ProductProperty::factory()->count(3), 'properties')
            ->create();
    }
}