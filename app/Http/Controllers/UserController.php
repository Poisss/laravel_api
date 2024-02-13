<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\User\StoreRequest;

class UserController extends Controller
{
    // Меняем Request на кастомизированый StoreRequest в котором мы вылидируем данные
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
        User::create($request->all());

        return response()->json(['success' => true,"message"=>"User created"],200);

    }

    public function login(Request $request)
    {
        return response()->json(['success' => true,"auth"=>true],200);
    }
    public function show($id)
    {
        return User::find($id);

        // Поиск по полю email
        // return User::query()->where('email',$id)->get();
        // Приходит только первая запись
        // return User::query()->where('email',$id)->first();
    }
}
