<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\Product;

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
            return $this->sendResponse(Product::all());
        }

        $categoryId = $_GET['categoryId'];
        $products = Product::whereHas('product_subcategory', function ($q) use ($categoryId) {
            $q->where('product_category_id', $categoryId);
        })->get();

        return $this->sendResponse($products);
    }

    public function show(Product $product)
    {
        return $this->sendResponse($product);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return $this->sendResponse($product);
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());

        return $this->sendResponse($product);
    }

    public function delete(Product $product)
    {
        $product->delete();

        return $this->sendResponse(null, null, 204);
    }
}
