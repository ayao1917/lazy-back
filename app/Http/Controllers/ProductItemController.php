<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\ProductItem;

class ProductItemController extends BaseController
{
    public function index()
    {
        if (!isset($_GET['productId'])) {
            return $this->sendResponse(ProductItem::all());
        }

        $productId = $_GET['productId'];
        $items = ProductItem::where('product_id', $productId)->get();

        return $this->sendResponse($items);
    }

    public function show(ProductItem $productItem)
    {
        return $productItem;
    }

    public function store(Request $request)
    {
        $productItem = ProductItem::create($request->all());

        return response()->json($productItem, 201);
    }

    public function update(Request $request, ProductItem $productItem)
    {
        $productItem->update($request->all());

        return response()->json($productItem, 200);
    }

    public function delete(ProductItem $productItem)
    {
        $productItem->delete();

        return response()->json(null, 204);
    }
}
