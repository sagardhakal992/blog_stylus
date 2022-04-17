<?php

namespace App\Http\Controllers\Blogs;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\Blogs\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class BlogController extends Controller
{
    public $blogService,$blogModel;
    public function __construct(BlogService $blogService,Blog $blog)
    {
        $this->blogService=$blogService;
        $this->blogModel=$blog;
    }

    public function storeForm()
    {
        return Inertia::render('BlogCreatePage');
    }

    public function store(Request $request)
    {
        $rules=$this->blogModel->getRules();
        $this->validate($request,$rules);
        try {
            $user=$request->user();
           $data=[
               "title"=>$request->title,
               "contents"=>$request->contents,
               "user_id"=>$user->id,
               "image"=>""
           ];

            if ($request->file('image'))
            {
                $file=$request->file('image');
                $fileName=$file->getClientOriginalName();
                $slug=Str::slug(date("m-d-Y-s-h-m"));
                $file->storeAs('public/images/'.$slug,$fileName);
                $data['image']=$slug."/".$fileName;

            }

            $categories=$request->categories ?? [];
            $data=$this->blogService->storeBlog($data,$categories);
            return redirect('blogs/all');

        }
        catch (\Exception $e)
        {
            return response()->json(['message'=>$e->getMessage()]);
        }
    }

    public function index()
    {
      $data=$this->blogService->getAllBlog();
      return Inertia::render('Home',[
          "blogs"=>$data
      ]);
    }

    public function show(Blog $blog)
    {

   if($blog)
   {
       return Inertia::render('DetailPage',['blog'=>$blog]);
   }
   else{
       return response()->json(['message'=>"Blog No found"],404);
   }
    }

    public function delete(Request $request,Blog $blog)
    {
        try {
            $blog->delete();
            return redirect('/blogs/all');
        }
        catch (\Exception $e)
        {
            return response()->json(['message'=>$e->getMessage()],404);
        }
    }
}
