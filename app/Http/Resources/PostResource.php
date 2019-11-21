<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\CommentResourceCollection;
use Illuminate\Support\Arr;


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
        $response = [
            'id' => $this->id,
            'titulo' => $this->title,
            'conteudo' => $this->content
        ]; 
        if ($request->has('with')) {
            switch ($request->get('with')) {
                case 'comments':
                    $response = Arr::add($response,'comments', new CommentResourceCollection($this->comments));
                    break;
            }
        }
        return $response;
    }
}
