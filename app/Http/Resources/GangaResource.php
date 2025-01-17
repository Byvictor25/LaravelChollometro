<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GangaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'url' => $this->url,
            'category' => $this->category->title,
            'likes' => $this->likes,
            'dislikes' => $this->dislikes,
            'price' => $this->price,

            'available' => $this->available,
            'user' => $this->user_id->name,
        ];
    }
}
