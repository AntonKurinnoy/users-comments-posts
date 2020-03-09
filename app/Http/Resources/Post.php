<?php

namespace App\Http\Resources;

use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Resources\Json\JsonResource;

class Post extends JsonResource
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
            'id' => $this->id,
            'content' => $this->content,
            'created_at_ts' => strtotime($this->created_at),
            'image_url' => Image::find($this->image_id),
            'count_of_comments' => Comment::where('post_id', $this->id)->count(), //пункт 6.2
        ];
    }
}
