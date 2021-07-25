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

class ViewController extends Controller
{
    public function View($slug){
        $Product= Product::where('slug',$slug)->first();
        $Proend = Product::where('category_id',$Product->category_id)->orWhere('id','<>',$Product->id)->get();
        return view('Frontend.Pages.ViewProduct',compact('Product','Proend'));
    }
}
