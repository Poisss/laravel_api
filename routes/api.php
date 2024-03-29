<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('/admin')->group(function(){

//     Route::apiResource('users',UserController::class);

//     Route::apiResource('ads', AdsController::class);

//     Route::apiResource('applications', ApplicationController::class);

//     Route::apiResource('tag', TagController::class);

//     Route::apiResource('messages', MessageController::class);

//     Route::apiResource('images', ImageController::class);

// });

// Route::post('/login',[UserController::class,'login']);

// Route::post('/signup',[UserController::class,'signup']);

// Route::apiResource('/users',UserController::class)->only('show');

// Route::apiResource('/tags', TagController::class)->except('show');

// Route::apiResource('/ads', AdsController::class);

// Route::apiResource('/applications', ApplicationController::class)->only('store');

// Route::apiResource('/messages', MessageController::class)->only('store');

// Route::apiResource('/images', ImageController::class)->only('store');

// Route::get('/applications/{message:application_id}/messages',[MessageController::class,'index']);

// Route::post('/applications/{id}/messages',[MessageController::class,'store']);


Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('/tags', TagController::class)->only('store','update','destroy');
    Route::apiResource('/ads', AdsController::class)->only('store','update','destroy');
    Route::apiResource('/applications', ApplicationController::class)->only('store');
    Route::apiResource('/messages', MessageController::class)->only('store');
    Route::apiResource('/images', ImageController::class)->only('store');
});

Route::post('/login',[UserController::class,'login']);

Route::post('/signup',[UserController::class,'signup']);

Route::apiResource('/users',UserController::class)->only('show');

Route::apiResource('/tags', TagController::class)->only('index');

Route::apiResource('/ads', AdsController::class)->only('index','show');

Route::get('/applications/{message:application_id}/messages',[MessageController::class,'index']);

Route::get('/download/images/{image}',[ImageController::class,'download']);

