<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\CommentResource;
use App\User;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'titulo' => $this->title,
            'conteúdo' => $this->content,
            'comentários' => CommentResource::collection($this->comments),
            'users' => User::all(),
            'data_agora' => \Carbon\Carbon::now()
        ];
    }
}
