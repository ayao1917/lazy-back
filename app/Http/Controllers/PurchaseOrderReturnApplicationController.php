<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\PurchaseOrderReturnApplication;

class PurchaseOrderReturnApplicationController extends Controller
{
    public function index()
    {
        return PurchaseOrderReturnApplication::all();
    }

    public function show(PurchaseOrderReturnApplication $purchaseOrderReturnApplication)
    {
        return $purchaseOrderReturnApplication;
    }

    public function store(Request $request)
    {
        $purchaseOrderReturnApplication = PurchaseOrderReturnApplication::create($request->all());

        return response()->json($purchaseOrderReturnApplication, 201);
    }

    public function update(Request $request, PurchaseOrderReturnApplication $purchaseOrderReturnApplication)
    {
        $purchaseOrderReturnApplication->update($request->all());

        return response()->json($purchaseOrderReturnApplication, 200);
    }

    public function delete(PurchaseOrderReturnApplication $purchaseOrderReturnApplication)
    {
        $purchaseOrderReturnApplication->delete();

        return response()->json(null, 204);
    }
}
