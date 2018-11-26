<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        return ProductCategory::all();
    }

    public function show(ProductCategory $productCategory)
    {
        return $productCategory;
    }

    public function store(Request $request)
    {
        $productCategory = ProductCategory::create($request->all());

        return response()->json($productCategory, 201);
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $productCategory->update($request->all());

        return response()->json($productCategory, 200);
    }

    public function delete(ProductCategory $productCategory)
    {
        $productCategory->delete();

        return response()->json(null, 204);
    }
}
