<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;

class ProductController extends Controller
{


    public function index(): JsonResponse
    {
        $products = Product::all();
        return response()->json($products);
    }



    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required',
        ]);

        $product = Product::create(
            $request->only('name', 'description', 'price')
        );
        return response()->json($product, 201);
    }


}
