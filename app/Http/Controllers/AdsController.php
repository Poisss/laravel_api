<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        return Ad::all();
    }

    public function store(Request $request)
    {
        Ad::create($request->all());

        return response()->json(["message"=>"Ad created"],200);
    }

    public function show($id)
    {
        return Ad::find($id);
    }

    public function update(Ad $ad,Request $request)
    {
        $ad->update($request->all());

        return response()->json(["message"=>"Ad updated"],200);;
    }

    public function destroy($id)
    {
        $ad=Ad::find($id);
        $ad->delete();
        return response()->json(["message"=>"Ad deleted"],200);;
    }
}
