<?php

namespace App\Http\Controllers;

use App\Http\Requests\Image\StoreRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return ['Изображение 1','Изображение 2'];
    }

    public function store(StoreRequest $request)
    {
        $image=Image::create($request->validated());

        return (new ImageResource($image))->response()->setStatusCode(201);
    }

    public function show(string $id)
    {
        return 'Изображение '.$id;
    }

    public function update(Request $request, string $id)
    {
        return 'Изображение '.$id.' обновлено';
    }

    public function destroy(string $id)
    {
        return 'Изображение '.$id.' удалено';
    }
}
