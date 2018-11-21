<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\Discount;

class DiscountController extends Controller
{
    public function index()
    {
        return Discount::all();
    }

    public function show(Discount $discount)
    {
        return $discount;
    }

    public function store(Request $request)
    {
        $discount = Discount::create($request->all());

        return response()->json($discount, 201);
    }

    public function update(Request $request, Discount $discount)
    {
        $discount->update($request->all());

        return response()->json($discount, 200);
    }

    public function delete(Discount $discount)
    {
        $discount->delete();

        return response()->json(null, 204);
    }
}
