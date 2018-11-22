<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\Product;
use lazyworker\Models\ProductCategory;

class ProductController extends BaseController
{
    /**
     * List product
     *
     * @param  [string] categoryId
     * @return [array] product list
     */
    public function index()
    {
        if (!isset($_GET['categoryId'])) {
            return $this->sendResponse(Product::all(), null);
        }

        $categoryId = $_GET['categoryId'];
        $products = Product::whereHas('product_subcategory', function ($q) use ($categoryId) {
            $q->where('product_category_id', $categoryId);
        })->get();

        return $this->sendResponse($products, null);
    }

    public function show(Product $product)
    {
        return $product;
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
}
