<?php

namespace App\Http\Requests\Image;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            "ad_id"=>["required","exists:ads,id"],
            "description"=>["nullable","string","max:255"],
            "image"=>["present","file","mimes:jpg,pdf,png,jfif"],
        ];
    }
}
