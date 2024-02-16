<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Support\Facades\Request;

class MessageController extends Controller
{
    public function index($id)
    {
        return MessageResource::collection(Message::query()->where('application_id',$id)->get())->response()->setStatusCode(200);
    }

    public function store(StoreRequest $request)
    {
        $message=Message::create($request->validated());

        return (new MessageResource($message))->response()->setStatusCode(201);
    }

}
