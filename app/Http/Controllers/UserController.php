<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\LoginRequest;
use App\Models\User;
use App\Http\Requests\User\StoreRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    // Меняем Request на кастомизированый StoreRequest в котором мы вылидируем данные

    // дальше использеум $request->validated() чтобы приходили только те данные которые прошли валидацию в StoreRequest
    public function signup(StoreRequest $request)
    {
        // Первый способ валидации, который не очень подходит для апи
        // $validator=Validator::make($request->all(),[
        //     "first_name" => "required",
        //     "last_name" => "required",
        //     "patronymic"=>"nullable",
        //     "email"=> ["required","email","unique:users,email"],
        //     "password"=>"required",
        // ]);

        // if($validator->fails()){
        //     return response()->json(["errors"=>$validator->errors()],422);
        // }

        // User::create($validator->validated());

        // return response()->json(["message"=>"User created"],200);

        // Второй способ валидации это использовать Кастомизированые request как в это UserRequest
        $user=User::create($request->validated());

        return (new UserResource($user))->response()->setStatusCode(201);

    }

    public function login(LoginRequest $request)
    {
        return response()->json(["data"=>['token' =>'просто строка, пока без токена']],200);
    }
    public function show(User $user)
    {
        return (new UserResource($user))->response()->setStatusCode(200);

        // Поиск по полю email
        // return User::query()->where('email',$id)->get();
        // Приходит только первая запись
        // return User::query()->where('email',$id)->first();
    }
}
