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
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeFrontendContronller extends Controller
{
    public function Home(){
        $Product = Product::where('sale_price','=', 1)->orderBy('created_at', 'DESC')->paginate(4);
        $Products = Product::orderBy('created_at', 'DESC')->where('sale_price','=', 0)->paginate(3);
        return view('Frontend.Pages.Home',compact('Product','Products'));
    }
}
