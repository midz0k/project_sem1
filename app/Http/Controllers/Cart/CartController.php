<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Admin\Product;
use App\Models\Admin\Brand;
use App\Models\Admin\Color;
use App\Models\Admin\Promotion;
use App\Models\Admin\Category;
use App\Models\Admin\attr;
use Illuminate\Support\Facades\DB;
use App\Models\orders;
use App\Mail\OrderShipped;
use App\Models\order_details;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function Add(Request $request,Cart $Cart){
        $Product = Product::find($request->id);
        $Cart -> add($Product, $request->quantity, $request->attr);
        return redirect()->route('Show_cart');
    }

    public function show_cart(Cart $Cart,Product $product){
        // $gio_hang = $Cart->content();
        // $color= $product ->getColorById($gio_hang['id']);
        return view('Frontend.Pages.Cart.Cart',compact('Cart'));
    }

    public function update_all(Request $request,Cart $Cart){
        $request = $request->except('_token');
        $Cart->update($request);
        return redirect()->back();
    }

    public function delete($key, Cart $Cart){
        $Cart->delete($key);
        return redirect()->back();
    }

    public function check_out(){
        return view('Frontend.Pages.Cart.CheckOut');
    }

    public function post_check_out(Request $request,orders $orders, Cart $Cart,order_details $order_details){
        // dd($request->all());
        $orders = $orders -> add($request, $Cart);
        if ($orders) {
            //thêm vào orderDetail
            $order_details->add($orders,$Cart);
            //tiến thành gửi mail
            Mail::to($request->email)->send(new OrderShipped());
            $Cart->delete_All();
            return redirect()->route('Cart.checkOut')->with('success','Đặt Hàng Thành Công!');
        }
    }
}
