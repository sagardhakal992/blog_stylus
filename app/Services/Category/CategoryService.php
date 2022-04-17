<?php

namespace App\Services\Category;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryService {
    public $categoryModel;
    public function __construct(Category $category )
    {
        $this->categoryModel=$category;
    }

    /**
     * @throws \Exception
     */
    public function storeCategory(array $data)
    {
        try {
            DB::beginTransaction();
            $data=$this->categoryModel->create($data);
            DB::commit();
            return $data;
        }
        catch (\Exception $e)
        {

          DB::rollBack();
          throw new \Exception($e->getMessage(),422);

        }
    }

    public function allCategory()
    {
        $data=Category::all();
        return $data;
    }

    public function delete(Request $request,Category $category)
    {
        try {
            $category->delete();
            return true;
        }
        catch (\Exception $e)
        {
            throw new \Exception($e->getMessage());
        }
    }
}
