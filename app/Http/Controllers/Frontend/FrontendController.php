<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Color;
use App\Models\Admin\Promotion;
use App\Models\Admin\Category;
use App\Models\Admin\attr;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function Products(Product $Product, Category $Category, Attr $attr,Brand $Brand,Color $Color,Promotion $Promotion){
        $Category = $Category->getCategory();
        $Brand = DB::table('brands')->get();
        $Color = $Color->get();
        $Product = $Product -> getProduct();
        $Promotion = $Promotion -> getPromotion();
        // dd($Promotion);
        return view('Frontend.Pages.Product',compact('Category', 'Brand', 'Color','Product','Promotion'));
    } 
    
    public function Category_Product(Product $Product, Category $Category, Attr $attr,Brand $Brand,Color $Color,Promotion $Promotion,$slug){
        $Cate= Category::where('slug',$slug)->paginate(5)->first();
        $Category = $Category->getCategory();
        $Brand = DB::table('brands')->get();
        $Color = $Color->get();
        $Product = $Product -> getProduct();
        $Promotion = $Promotion -> getPromotion();
        // dd($Promotion);
        return view('Frontend.Pages.Product_Category',compact('Category', 'Brand', 'Color','Product','Promotion','Cate'));
    }

    public function Brand_Product(Product $Product, Category $Category, Attr $attr,Brand $Brand,Color $Color,Promotion $Promotion,$slug){
        $Bran= Brand::where('slug',$slug)->paginate(5)->first();
        $Category = $Category->getCategory();
        $Brand = DB::table('brands')->get();
        $Color = $Color->get();
        $Product = $Product -> getProduct();
        $Promotion = $Promotion -> getPromotion();
        // dd($Promotion);
        return view('Frontend.Pages.Product_Brant',compact('Category', 'Brand', 'Color','Product','Promotion','Bran'));
    }

    public function Promotion_Product(Product $Product, Category $Category, Attr $attr,Brand $Brand,Color $Color,Promotion $Promotion,$slug){
        $Promotions= Promotion::where('name',$slug)->paginate(5)->first();
        $Category = $Category->getCategory();
        $Brand = DB::table('brands')->get();
        $Color = $Color->get();
        $Product = $Product -> getProduct();
        $Promotion = $Promotion -> getPromotion();
        // dd($Promotion);
        return view('Frontend.Pages.Product_Promotion',compact('Category', 'Brand', 'Color','Product','Promotion','Promotions'));
    }

}
