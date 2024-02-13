<?php

namespace App\Http\Requests\Application;

use App\Http\Requests\ApiRequest;

class StoreRequest extends ApiRequest
{
    public function rules(): array
    {
        return [
            'ad_id'=>["required","exists:ads,id"],
            'user_id'=>["required","exists:users,id"],
            'price'=>['required','decimal:2'],
            'marked'=>["nullable",'boolean'],
        ];
    }
}
