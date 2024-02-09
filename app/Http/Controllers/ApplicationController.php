<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function store(Request $request)
    {
        Application::create($request->all());

        return response()->json(['success' => true,"message"=>"Application created"],200);
    }

}
