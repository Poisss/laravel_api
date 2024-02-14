<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ad\StoreRequest;
use App\Models\Ad;

class AdsController extends Controller
{
    public function index()
    {
        return Ad::all();
    }

    public function store(StoreRequest $request)
    {
        $ad=Ad::create($request->all());

        // if($request->filled('images')){
        //     foreach($request->images as $image){
        //         $ad->image()->create(['ad_id'=>$ad->id] + $image->all());
        //     }
        // }
        if($request->filled('tags')){
            $ad->tag()->sync($request->tags);
        }

        return response()->json(['success' => true,"message"=>"Ad created"],200);
    }

    public function show(Ad $ad)
    {
        return $ad;
    }

    public function update(Ad $ad,StoreRequest $request)
    {
        $ad->update($request->all());

        $ad->tag()->sync($request->tags);

        return response()->json(['success' => true,"message"=>"Ad updated"],200);;
    }

    public function destroy($id)
    {
        $ad=Ad::find($id);
        $ad->delete();
        return response()->json(['success' => true,"message"=>"Ad deleted"],200);;
    }
}
