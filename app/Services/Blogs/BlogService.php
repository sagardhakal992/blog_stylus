<?php
namespace App\Services\Blogs;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogService{
    public $blogModel;
    public function __construct(Blog $blog)
    {
        $this->blogModel=$blog;
    }
    public function storeBlog(array $data,array $categories)
    {
        try {
            \Illuminate\Support\Facades\DB::beginTransaction();
            $blog=$this->blogModel->create($data);
            if(count($categories)>0){
                $blog->$categories()->associate($categories);
            }
            DB::commit();
            return $blog;
        }
        catch (\Exception $e)
        {
            \Illuminate\Support\Facades\DB::rollBack();
            throw new \Exception($e->getMessage());
        }
    }

    public function getAllBlog()
    {
        $data=Blog::all();
        return $data;
    }

}
