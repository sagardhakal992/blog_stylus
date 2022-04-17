<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resource\Category\CategoryResource;
use App\Models\Category;

use App\Services\Category\CategoryService;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public $categoryService,$categoryModel;
    public function __construct(CategoryService $categoryService,Category $category)
    {
        $this->categoryService=$categoryService;
        $this->categoryModel=$category;
    }

    public function store(Request $request)
    {

            $rules=$this->categoryModel->getRules();
            $this->validate($request,$rules);
        try{
            $data=[
                "title"=>$request->title,
                'description'=>$request->description??"",
                "image"=>''
            ];

            if ($request->file('image'))
            {
                $file=$request->file('image');
                $fileName=$file->getClientOriginalName();
                $slug=Str::slug(date("m-d-Y-s-h-m"));
                $file->storeAs('public/images/'.$slug,$fileName);
                $data['image']=$slug."/".$fileName;
            }
            $data=$this->categoryService->storeCategory($data);
            return $data;
        }
        catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function index()
    {
        $data=$this->categoryService->allCategory();
        return Inertia::render();
    }

    public function delete(Request $request,Category $category)
    {
        try {
            $data= $this->categoryService->delete($request,$category);
            if($data)
            {
                return response()->json(['msg' => "deleted successfully"]);
            }
        }
        catch (\Exception $e)
        {
            return \response()->json(['message'=>$e->getMessage()]);
        }
    }
}
