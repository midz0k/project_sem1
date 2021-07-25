<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Color;
use App\Models\Admin\Promotion;
use App\Models\Admin\Category;
use App\Models\Admin\attr;
use App\Http\Requests\Admin\ProductRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\BrandCategory;

class ProductController extends Controller
{
    public function index(Product $product){
        if (isset($_GET['sort_by'])) {

            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'kytu_az') {
                $Product = Product::orderBy('name', 'ASC')->paginate(8);
            }elseif ($sort_by == 'kytu_za') {
                $Product = Product::orderBy('name', 'DESC')->paginate(8);
            }elseif ($sort_by == 'giam') {
                $Product = Product::orderBy('price', 'DESC')->paginate(8);
            }elseif ($sort_by == 'tang') {
                $Product = Product::orderBy('price', 'ASC')->paginate(8);
            }else{
                $Product = $product -> paginate(8);
            }

        }elseif (isset($_GET['Search'])) {
            $Search = $_GET['Search'];
            // dd($_GET['Search']);
            $Product = DB::table('products')->where('name', 'LIKE', '%' . $Search . '%')->paginate(8);
        }else{
            $Product = $product -> paginate(8);
        }

        return view('Admin.Pages.product.TableProduct',compact('Product'));
    }

    public function create(REQUEST $request,Brand $brand,Color $color,Promotion $promotion,Category $category)
    {
        $Brand = $brand -> get();
        $Color = $color -> get();
        $Promotion = $promotion -> get();
        $Category = $category -> get();
        return view('Admin.Pages.Product.CreateProduct', compact('Brand','Color','Promotion','Category'));
    }

    public function creates(ProductRequest $request,Product $Product)
    {
        // dd($request->file('fules'));
        //Thực hiện upload Ảnh
        if ($request->file('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads/'),$file_name);
        }

        $request->merge(['image'=>$file_name]);
        $product = Product::create($request->all());

        //Thực hiện thêm ảnh liên quan đến màu
        // dd($request->color);
        if ($request->color) {
            $i = 0;
            foreach ($request->file('fules') as $key => $files){
                $file_names = $files->getClientOriginalName();
                $files->move(public_path('uploads/'),$file_names);
                attr::create([
                    'product_id'=> $product->id,
                    'color_id'=> $request->color[$i],
                    'image'=>$file_names,
                ]);
                $i++;
            }

        }

        if ($product) {
            return redirect() -> route('TableProduct')->with('success','Thêm mới thành công!');
        }else{
            return redirect() -> route('CreateProduct')->with('success','Thêm mới thất bại!');
        }
    }

    //Update
    public function editProduct($id,Product $product,Category $category,Color $color,attr $attr,Brand $brand,Promotion $promotion){
        $Product = $product->find_id($id);
        $Category = $category->get();
        $Color =  $color -> get();
        $Brand = $brand -> get();
        $Promotion = $promotion -> get();
        $col = attr::where('product_id',$id)->pluck('color_id')->toArray();
        $images = attr::where('product_id',$id)->get();
        // dd($images);
        return view('Admin.Pages.Product.EditProduct',compact('Product','Category','Color','col','Brand','Promotion','images'));
    }

    public function updateProduct(REQUEST $request, $id){
        $Product = Product::find($id);

        // dd($Product);

        //Thực hiện Sửa Ảnh
        if ($request->file('file')) {
            $file = $request->file('file');
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads/'),$file_name);
        }else{
            $file_name = $Product->image;
        }
        $request->merge(['image'=>$file_name]);

        $Product->update($request->all());

        //Cập nhật màu
        //Thực hiện thêm ảnh liên quan đến màu
        // dd($request->color);
        attr::where('product_id',$id)->delete();
        if ($request->color) {
            $i = 0;
            foreach ($request->file('fules') as $key => $files){
                $file_names = $files->getClientOriginalName();
                $files->move(public_path('uploads/'),$file_names);
                attr::create([
                    'product_id'=> $Product->id,
                    'color_id'=> $request->color[$i],
                    'image'=>$file_names,
                ]);
                $i++;
            }
        }

        if ($Product) {
            return redirect() -> route('TableProduct')->with('success','Sửa thành công!');
        }else{
            return redirect() -> route('TableProduct')->with('success','Sửa thất bại!');
        }
    }

    //DELETE
    public function deletePro(attr $attr, $id){
        $attr -> deleteProduc($id);
        $sv = Product::find($id)->Delete();

        if ($sv) {
            return redirect() -> route('TableProduct')->with('success','Dữ liệu xóa thành công!');
        }else{
            return redirect() -> route('TableProduct')->with('success','Dữ liệu xóa thất bại!');
        }
    }

    public function Brands_Category(Request $request,BrandCategory $brandCategory){
        // dd($request->id);
        $Brand = BrandCategory::where('category_id',$request->category)->get();
        // dd($Brand);
        return response()->json($Brand);
    }
}