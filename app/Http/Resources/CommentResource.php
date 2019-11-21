<?php

namespace App\Http\Resources;

use Illuminate\Support\Arr;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comentario' => $this->comment,
            'data_hora' => $this->created_at->format('d-m-Y : H:i:s'),
            'data_hora_atualizacao' => $this->updated_at->format('d-m-Y : H:i:s')
        ];

        if ($request->has('with')) {
            
            switch ($request->get('with')) {
                case 'post':
                    $response = Arr::add($response, 'post', new PostResource($this->post));
                    break;
            }
        }
        return $response;
    }
}
