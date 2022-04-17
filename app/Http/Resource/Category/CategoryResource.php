<?php

namespace App\Http\Resource\Category;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            "id"=>$this->id,
            "title"=>$this->title??"",
            "description"=>$this->description ?? "",
            "image"=>$this->image ?? ""
        ];
    }
}
