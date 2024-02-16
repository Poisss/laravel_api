<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'from' => $this->from,
            'until' => $this->until,
            'tags' => TagResource::collection($this->tag),
            'user' => new UserResource($this->user),
            'contractor' => new UserResource($this->contractor),
            'applications' => [
                                'id'=>$this->application['id'],
                                'user'=>$this->application['user_id'],
                                'price'=>$this->application['price'],
            ],
        ];
    }
}
