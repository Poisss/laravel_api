<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ad\StoreRequest;
use App\Http\Resources\AdResource;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index()
    {
        return AdResource::collection(Ad::all())->response()->setStatusCode(200);
    }

    public function store(StoreRequest $request)
    {
        $ad=Ad::create($request->validated());

        // if($request->filled('images')){
        //     foreach($request->images as $image){
        //         $ad->image()->create(['ad_id'=>$ad->id] + $image->all());
        //     }
        // }
        if($request->filled('tags')){
            $ad->tag()->sync($request->tags);
        }

        return (new AdResource($ad))->response()->setStatusCode(201);
    }

    public function show(Ad $ad)
    {
        return (new AdResource($ad))->response()->setStatusCode(200);
    }

    public function update(Ad $ad,StoreRequest $request)
    {
        $ad->update($request->validated());

        $ad->tag()->sync($request->tags);

        return (new AdResource($ad))->response()->setStatusCode(200);
    }

    public function destroy(Ad $ad)
    {
        $ad->delete();

        return response(null,204);
    }
}
