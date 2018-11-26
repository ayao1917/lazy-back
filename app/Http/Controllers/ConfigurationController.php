<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Configuration;

class ConfigurationController extends Controller
{
    public function index()
    {
        return Configuration::all();
    }

    public function show(Configuration $configuration)
    {
        return $configuration;
    }

    public function store(Request $request)
    {
        $configuration = Configuration::create($request->all());

        return response()->json($configuration, 201);
    }

    public function update(Request $request, Configuration $configuration)
    {
        $configuration->update($request->all());

        return response()->json($configuration, 200);
    }

    public function delete(Configuration $configuration)
    {
        $configuration->delete();

        return response()->json(null, 204);
    }
}
