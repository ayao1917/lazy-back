<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\PurchaseOrder;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        return PurchaseOrder::all();
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        return $purchaseOrder;
    }

    public function store(Request $request)
    {
        $purchaseOrder = PurchaseOrder::create($request->all());

        return response()->json($purchaseOrder, 201);
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->update($request->all());

        return response()->json($purchaseOrder, 200);
    }

    public function delete(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return response()->json(null, 204);
    }
}
