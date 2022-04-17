<?php

namespace App\Http\Resource\Blogs;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{

    public function toArray($request)
    {
       return [
           "id"=>$this->id,
           "title"=>$this->title??"",
           "content"=>$this->content,
       ];
    }
}
