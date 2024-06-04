<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with('properties')
            ->when($request->has('properties'), function ($query) use ($request) {
                foreach ($request->properties as $name => $values) {
                    $query->whereHas('properties', function ($query) use ($name, $values) {
                        $query->where('name', $name)->whereIn('value', $values);
                    });
                }
            })
            ->paginate(40);

        return response()->json($products);
    }

    public function store(StoreProductRequest $request)
    {
        $product = function () use ($request) {
            $product = Product::create($request->validated());

            if ($request->has('properties')) {
                foreach ($request->properties as $property) {
                    $product->properties()->create($property);
                }
            }

            return $product;
        };
        DB::transaction($product);

        return response()->json($product, 201);
    }
}
