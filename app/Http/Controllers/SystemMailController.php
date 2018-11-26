<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\SystemMail;

class SystemMailController extends Controller
{
    public function index()
    {
        return SystemMail::all();
    }

    public function show(SystemMail $systemMail)
    {
        return $systemMail;
    }

    public function store(Request $request)
    {
        $systemMail = SystemMail::create($request->all());

        return response()->json($systemMail, 201);
    }

    public function update(Request $request, SystemMail $systemMail)
    {
        $systemMail->update($request->all());

        return response()->json($systemMail, 200);
    }

    public function delete(SystemMail $systemMail)
    {
        $systemMail->delete();

        return response()->json(null, 204);
    }
}
