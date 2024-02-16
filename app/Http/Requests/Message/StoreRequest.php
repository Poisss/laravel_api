<?php

namespace App\Http\Requests\Message;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "application_id"=>["required","exists:applications,id"],
            "user_id"=>["required","exists:users,id"],
            "text"=>["required","string","max:255"],
        ];
    }
}
