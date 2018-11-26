<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\SystemLog;

class SystemLogController extends Controller
{
    public function index()
    {
        return SystemLog::all();
    }

    public function show(SystemLog $systemLog)
    {
        return $systemLog;
    }

    public function store(Request $request)
    {
        $systemLog = SystemLog::create($request->all());

        return response()->json($systemLog, 201);
    }

    public function update(Request $request, SystemLog $systemLog)
    {
        $systemLog->update($request->all());

        return response()->json($systemLog, 200);
    }

    public function delete(SystemLog $systemLog)
    {
        $systemLog->delete();

        return response()->json(null, 204);
    }
}
