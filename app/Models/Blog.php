<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends=[
      "image_url"
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class,'blog_category');
    }

    public function getImageUrlAttribute():String
    {
        $image=$this->image;
        return asset('storage/images/'.$image);
    }
   static public function getRules(): array
   {
       return [
           "title"=>['required','string','min:5','max:20'],
           "contents"=>['required','string']
       ];
   }
}
