<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "first_name" => ["required","string","max:255","alpha"],
            "last_name" => ["required","string","max:255","alpha"],
            "patronymic"=>["nullable","string","max:255","alpha"],
            "email"=> ["required","string","email","unique:users,email","max:255"],
            "password"=>["required","string","min:5","max:255","current_password"],
        ];
    }
}
