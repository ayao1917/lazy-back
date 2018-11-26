<?php

namespace lazyworker\Http\Controllers;

use Illuminate\Http\Request;
use lazyworker\UserMessage;

class UserMessageController extends Controller
{
    public function index()
    {
        return UserMessage::all();
    }

    public function show(UserMessage $userMessage)
    {
        return $userMessage;
    }

    public function store(Request $request)
    {
        $userMessage = UserMessage::create($request->all());

        return response()->json($userMessage, 201);
    }

    public function update(Request $request, UserMessage $userMessage)
    {
        $userMessage->update($request->all());

        return response()->json($userMessage, 200);
    }

    public function delete(UserMessage $userMessage)
    {
        $userMessage->delete();

        return response()->json(null, 204);
    }
}
