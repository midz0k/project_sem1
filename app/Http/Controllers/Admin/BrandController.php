<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Http\Requests\Admin\BrandRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\attr;
use App\Models\Admin\BrandCategory;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{
    public function index(Brand $brand)
    {
        if (isset($_GET['sort_by'])) {

            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'kytu_az') {
                $Brand = Brand::orderBy('name', 'ASC')->paginate(8);
            }elseif ($sort_by == 'kytu_za') {
                $Brand = Brand::orderBy('name', 'DESC')->paginate(8);
            }else{
                $Brand = $brand -> paginate(8);
            }

        }elseif (isset($_GET['Search'])) {
            $Search = $_GET['Search'];
            // dd($_GET['Search']);
            $Brand = DB::table('brands')->where('name', 'LIKE', '%' . $Search . '%')->paginate(8);
        }else{
            $Brand = $brand -> paginate(8);
        }
        return view('Admin.Pages.Brand.TableBrand',compact('Brand'));
    }

    //Thêm mới
    public function create(REQUEST $request)
    {
        return view('Admin.Pages.Brand.CreateBrand');
    }

    public function creates(BrandRequest $request,Brand $brand)
    {
        // dd($request -> all());
        $create = $brand -> creates($request);
        if ($create) {
            return redirect() -> route('TableBrand')->with('success','Thêm mới thành công!');
        }else{
             return redirect() -> route('CreateBrand')->with('success','Thêm mới thất bại!');
        }
    }

    //Edit Category
    public function editBrand($id,Brand $brand,Category $category){
        $Brand = $brand->find_id($id);
        return view('Admin.Pages.Brand.EditBrand',compact('Brand'));
    }

    public function updateBrand(REQUEST $request, $id,Brand $brand){
        // dd ($request->all());
        // dd ($id);
        
        $Brand = $brand -> find_id($id) -> update($request -> all());

        if ($Brand) {
            return redirect() -> route('TableBrand')->with('success','Sửa thành công!');
        }else{
            return redirect() -> route('TableBrand')->with('success','Sửa thất bại!');
        }
    }

    //delete
    public function deleteBrand(REQUEST $request, $id, Brand $brand,Product $product,attr $attr, BrandCategory $brandCategory){
        $pro = $product -> Brand_id($id);
        $bran = $brandCategory -> Brand_id($id);
        // dd($pro);
        if (count($pro) > 0) {
            $product= Product::where('brand_id', $id) -> get();
            foreach ($product as $value){
                $deletes= attr::where('product_id', $value->id) -> delete();
            }
            $products= Product::where('brand_id', $id) -> delete();
            $delete = $brand -> find_id($id) -> delete();
            if ($delete) {
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thất bại!');
            }
        }elseif (count($bran) > 0) {
            $bran= BrandCategory::where('brand_id', $id) -> delete();
            $delete = $brand -> find_id($id) -> delete();
            if ($delete) {
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thất bại!');
            }        
        }elseif (count($pro) > 0 && count($bran) > 0) {
            $product= Product::where('brand_id', $id) -> get();
            foreach ($product as $value){
                $deletes= attr::where('product_id', $value->id) -> delete();
            }
            $products= Product::where('brand_id', $id) -> delete();

            $bran= BrandCategory::where('brand_id', $id) -> delete();
            $delete = $brand -> find_id($id) -> delete();
            
            if ($delete) {
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thất bại!');
            }      
        }else {
            $delete = $brand -> find_id($id) -> delete();

            if ($delete) {
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableBrand')->with('success','Dữ liệu xóa thất bại!');
            }
        }
    }
}
