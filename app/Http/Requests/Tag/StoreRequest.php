<?php

namespace App\Http\Requests\Tag;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            "name"=>["required","string","max:60","alpha","unique:tags,name"]
        ];
    }
}
