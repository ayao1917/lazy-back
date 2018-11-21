<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\Home;

class HomeController extends Controller
{
    public function index()
    {
        $home = Home::where('type', 2)->whereNotNull('photo')->get();

        return response()->json($home, 200);
    }

    public function show(Home $home)
    {
        return $home;
    }

    public function store(Request $request)
    {
        $home = Home::create($request->all());

        return response()->json($home, 201);
    }

    public function update(Request $request, Home $home)
    {
        $home->update($request->all());

        return response()->json($home, 200);
    }

    public function delete(Home $home)
    {
        $home->delete();

        return response()->json(null, 204);
    }

    public function slide()
    {
        $home = Home::where('type', 1)->whereNotNull('photo')->get();

        return response()->json($home, 200);
    }
}
