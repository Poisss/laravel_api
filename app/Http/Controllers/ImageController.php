<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\StoreRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function store(StoreRequest $request)
    {
        $filename=$request->file('image')->getClientOriginalName();
        $path=$request->file('image')->store('/','public');
        $image=Image::create(["path"=>$path,"name"=>$filename]+$request->validated());

        return (new ImageResource($image))->response()->setStatusCode(201);
    }
    public function download(Image $image){
        return Storage::download('public/'.$image->path,$image->name);
    }
}
