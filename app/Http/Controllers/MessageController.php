<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function index()
    {
        return Message::all();
    }

    public function store(StoreRequest $request)
    {
        Message::create($request->all());

        return response()->json(['success' => true,"message"=>"Message created"],200);
    }

}
