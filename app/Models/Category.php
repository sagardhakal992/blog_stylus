<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class,'blog_category');
    }
    static public function getRules():array
    {
        return [
            "title"=>"required",
            "description"=>['nullable','string'],
            "image"=>["required"]
        ];
    }
}
