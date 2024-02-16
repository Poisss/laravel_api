<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreRequest;
use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return TagResource::collection(Tag::all())->response()->setStatusCode(200);
    }

    public function store(StoreRequest $request)
    {
        $tag=Tag::create($request->validated());

        return (new TagResource($tag))->response()->setStatusCode(201);
    }

    public function update(Tag $tag,StoreRequest $request)
    {
        $tag->update($request->validated());

        return (new TagResource($tag))->response()->setStatusCode(200);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response(null,204);
    }
}
