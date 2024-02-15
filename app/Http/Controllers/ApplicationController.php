<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\StoreRequest;
use App\Models\Application;

class ApplicationController extends Controller
{

    public function store(StoreRequest $request)
    {
        Application::create($request->validated());

        return response()->json(['success' => true,"message"=>"Application created"],200);
    }

}
