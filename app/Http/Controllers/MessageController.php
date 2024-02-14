<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreRequest;
use App\Models\Message;
use Illuminate\Support\Facades\Request;

class MessageController extends Controller
{
    public function index($id)
    {
        return Message::query()->where('application_id',$id)->get();
    }

    public function store(StoreRequest $request)
    {
        Message::create($request->all());

        return response()->json(['success' => true,"message"=>"Message created"],200);
    }

}
