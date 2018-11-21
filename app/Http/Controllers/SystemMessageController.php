<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\Models\SystemMessage;

class SystemMessageController extends Controller
{
    public function index()
    {
        return SystemMessage::all();
    }

    public function show(SystemMessage $systemMessage)
    {
        return $systemMessage;
    }

    public function store(Request $request)
    {
        $systemMessage = SystemMessage::create($request->all());

        return response()->json($systemMessage, 201);
    }

    public function update(Request $request, SystemMessage $systemMessage)
    {
        $systemMessage->update($request->all());

        return response()->json($systemMessage, 200);
    }

    public function delete(SystemMessage $systemMessage)
    {
        $systemMessage->delete();

        return response()->json(null, 204);
    }
}
