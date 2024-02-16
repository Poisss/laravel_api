<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\StoreRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;

class ApplicationController extends Controller
{

    public function store(StoreRequest $request)
    {
        $application=Application::create($request->validated());

        return (new ApplicationResource($application))->response()->setStatusCode(201);
    }

}
