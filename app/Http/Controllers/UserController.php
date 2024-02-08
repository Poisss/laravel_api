<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signup(Request $request)
    {
        $validator=Validator::make($request->all(),[
            "first_name" => "required",
            "last_name" => "required",
            "patronymic"=>"nullable",
            "email"=> ["required","email","unique:users,email"],
            "password"=>"required",
        ]);

        if($validator->fails()){
            return response()->json(["errors"=>$validator->errors()],422);;
        }

        User::create($validator->validated());

        return response()->json(["message"=>"User created"],200);;
    }

    public function login(Request $request)
    {
        return response()->json(["auth"=>true],200);;
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
