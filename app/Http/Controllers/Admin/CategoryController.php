<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\attr;
use App\Http\Requests\Admin\CategoryRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\BrandCategory;


class CategoryController extends Controller
{
    public function index(Category $category, Request $request)
    {
        if (isset($_GET['sort_by'])) {

            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'kytu_az') {
                $Category = Category::orderBy('name', 'ASC')->paginate(8);
            }elseif ($sort_by == 'kytu_za') {
                $Category = Category::orderBy('name', 'DESC')->paginate(8);
            }else{
                $Category = $category -> paginate(8);
            }

        }elseif (isset($_GET['Search'])) {
            $Search = $_GET['Search'];
            // dd($_GET['Search']);
            $Category = DB::table('categories')->where('name', 'LIKE', '%' . $Search . '%')->paginate(8);
        }else{
            $Category = $category -> paginate(8);
        }

        return view('Admin.Pages.Category.TableCategory',compact('Category'));
    }

    //Thêm mới
    public function create(REQUEST $request)
    {
        return view('Admin.Pages.Category.CreateCategory');
    }

    public function creates(CategoryRequest $request,Category $category)
    {
        $create = $category -> creates($request);
        if ($create) {
            return redirect() -> route('TableCategory')->with('success','Thêm mới thành công!');
        }else{
            return redirect() -> route('Create')->with('success','Thêm mới thất bại!');
        }
    }

    //Edit Category
     public function editCate($id,Category $category){
        $Category = $category->find_id($id);
        return view('Admin.Pages.Category.EditCategory',compact('Category'));
    }

    public function updateCate(REQUEST $request, $id,Category $category){
        // dd ($request->all());
        // dd ($id);
        
        $Category = $category -> find_id($id) -> update($request -> all());

        if ($Category) {
            return redirect() -> route('TableCategory')->with('success','Sửa thành công!');
        }else{
            return redirect() -> route('editCate')->with('success','Sửa thất bại!');
        }
    }

    //delete
    public function deleteCate(REQUEST $request, $id, Category $category,Product $product,BrandCategory $brandCategory){
        $Pro = $product->Category_id($id);
        $BrandCategory = $brandCategory->Category_id($id);
        if (count($Pro)>0 || count($BrandCategory)>0) {
            $product= Product::where('category_id', $id) -> get();
            // dd($product);
            foreach ($product as $value){
                $deletes= attr::where('product_id', $value->id) -> delete();
                // dd($deletes);
            }
            $products= Product::where('category_id', $id) -> delete();
            $BrandCategory= BrandCategory::where('category_id', $id) -> delete();
            $delete = $category -> find_id($id) -> delete();
            if ($delete) {
                return redirect() -> route('TableCategory')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableCategory')->with('success','Dữ liệu xóa thất bại!');
            }
        }
        else {
            $delete = $category -> find_id($id) -> delete();
            if ($delete) {
                return redirect() -> route('TableCategory')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableCategory')->with('success','Dữ liệu xóa thất bại!');
            }
        }
    }
}
