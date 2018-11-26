<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\ProductSubcategory;

class ProductSubcategoryController extends Controller
{
    public function index()
    {
        return ProductSubcategory::all();
    }

    public function show(ProductSubcategory $productSubcategory)
    {
        return $productSubcategory;
    }

    public function store(Request $request)
    {
        $productSubcategory = ProductSubcategory::create($request->all());

        return response()->json($productSubcategory, 201);
    }

    public function update(Request $request, ProductSubcategory $productSubcategory)
    {
        $productSubcategory->update($request->all());

        return response()->json($productSubcategory, 200);
    }

    public function delete(ProductSubcategory $productSubcategory)
    {
        $productSubcategory->delete();

        return response()->json(null, 204);
    }
}
