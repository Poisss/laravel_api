<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\StoreRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(StoreRequest $request)
    {
        Tag::create($request->all());

        return response()->json(['success' => true,"message"=>"Tag created"],200);
    }

    public function update(Tag $tag,StoreRequest $request)
    {
        $tag->update($request->all());

        return response()->json(['success' => true,"message"=>"Tag updated"],200);;
    }

    public function destroy($id)
    {
        $tag=Tag::find($id);
        $tag->delete();
        return response()->json(['success' => true,"message"=>"Tag deleted"],200);;
    }
}
