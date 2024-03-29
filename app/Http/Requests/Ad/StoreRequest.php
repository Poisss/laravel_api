<?php

namespace App\Http\Requests\Ad;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            "user_id"=>["required","exists:users,id"],
            "contractor_id"=>["nullable","exists:users,id","different:user_id"],
            "title"=>["required","string","max:155"],
            "text"=>["required","string"],
            "from"=>["required","date","after:tomorrow"],
            "until"=>["required","date","after_or_equal:from"],
            "tags"=>["nullable","array"],
            "tags.*"=>["present","exists:tags,id"],
        ];
    }
}
