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
        Ad::create($request->all());

        return response()->json(['success' => true,"message"=>"Ad created"],200);
    }

    public function show($id)
    {
        return Ad::find($id);
    }

    public function update(Ad $ad,StoreRequest $request)
    {
        $ad->update($request->all());

        return response()->json(['success' => true,"message"=>"Ad updated"],200);;
    }

    public function destroy($id)
    {
        $ad=Ad::find($id);
        $ad->delete();
        return response()->json(['success' => true,"message"=>"Ad deleted"],200);;
    }
}
