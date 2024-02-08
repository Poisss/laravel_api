<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        Tag::create($request->all());

        return response()->json(["message"=>"Tag created"],200);
    }

    public function update(Tag $tag,Request $request)
    {
        $tag->update($request->all());

        return response()->json(["message"=>"Tag updated"],200);;
    }

    public function destroy($id)
    {
        $tag=Tag::find($id);
        $tag->delete();
        return response()->json(["message"=>"Tag deleted"],200);;
    }
}
