<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class BookResource extends JsonResource
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
            'author' => $this->author,
            'genre' => $this->genre,
            'description' => $this->description,
            'isbn' => $this->isbn,
            'image' => $this->image,
            'published' => $this->published,
            'publisher' => $this->publisher,
            'updated_at' => Carbon::parse($this->updated_at)->diffForHumans(),
            'created_at' => Carbon::parse($this->updated_at)->format('m/d/Y'),
        ];
    }
}
