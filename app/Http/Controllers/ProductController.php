<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index(Request $request)
    {
        $products = Product::all();
        return response()->json($products);
    }

    function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    function show(Request $request, Product $product)
    {
      return $product;
    }

    function destroy(Request $request, Product $product) {
        $product->delete();
        return response()->json(['message' => 'Product Deleted']);
    }

    function update(Request $request, Product $product) {
        $product->update($request->all());

        return response()->json($product);
    }
}
