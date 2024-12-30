<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => $this->whenLoaded('category', CategoryResource::make($this->category)),
            'author' => $this->whenLoaded('author', AuthorResource::make($this->author)),
            'content' => $this->content,
            'tags' => $this->tags,
            'image' => Storage::url($this->image),
            'is_liked' => $this->isLiked(),
            'is_bookmarked' => $this->isBookmarked(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}