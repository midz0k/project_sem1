<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\BrandCategory;
use App\Http\Requests\Admin\BrandCateRequest;


class BranCateController extends Controller
{
    public function index(BrandCategory $BrandCategory)
    {
        $BrandCategory = $BrandCategory->get();
        return view('Admin.Pages.Brand_Category.Table',compact('BrandCategory'));
    }

    //Thêm mới
    public function CreateBrand(REQUEST $request, Category $category, Brand $brand)
    {
        $Category = $category->get();
        $Brand = $brand->get();
        return view('Admin.Pages.Brand_Category.Create',compact('Category', 'Brand'));
    }

    public function CreateBrandCategorys(BrandCateRequest $request,BrandCategory $BrandCategory)
    {
        $create = $BrandCategory -> creates($request);
        if ($create) {
            return redirect() -> route('Table-Brand-Category')->with('success','Thêm mới thành công!');
        }else{
             return redirect() -> route('Table-Brand-Category')->with('success','Thêm mới thất bại!');
        }
    }

    //Edit Category
    public function editBrandCategory($id,Brand $brand,Category $category,BrandCategory $BrandCategory){
        $BrandCategory = $BrandCategory->find_id($id);
        $Category = $category->get();
        $Brand = $brand->get();
        return view('Admin.Pages.Brand_Category.Edit',compact('BrandCategory','Brand','Category'));
    }

    public function updateBrandCategorys(REQUEST $request, $id,BrandCategory $BrandCategory){
        // dd ($request->all());
        // dd ($id);
        
        $BrandCategory = $BrandCategory -> find_id($id) -> update($request -> all());

        if ($BrandCategory) {
            return redirect() -> route('Table-Brand-Category')->with('success','Sửa thành công!');
        }else{
            return redirect() -> route('Table-Brand-Category')->with('success','Sửa thất bại!');
        }
    }
}
