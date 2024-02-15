<?php

namespace App\Http\Requests\user;

use App\Http\Requests\ApiRequest;

class LoginRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "email"=> ["required","string","email","exists:users,email","max:255"],
            "password"=>["required","string","min:5","max:255"],
        ];
    }
}
