<?php

namespace App\Http\Requests\Ad;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            "user_id"=>["required","exists:users,id"],
            "contractor_id"=>["required","exists:users,id"],
            "title"=>["required","string","max:155","alpha_num"],
            "text"=>["required","string"],
            "from"=>["required","date","after:tomorrow"],
            "until"=>["required","date","after:from"],
            "tags.*.id"=>["required"]
        ];
    }
}
