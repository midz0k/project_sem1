<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Promotion;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','slug','origin','weight','price','sale_price','image','brand_id','category_id','promotion_id','status','description','created_at','updated_at'];
    // public $timestamps = false;
    use HasFactory;

    public function get(){
        return $this->all();
    } 

    public function getProduct(){
        $list = Product::where('status',1)->orderBy('sale_price','DESC')->paginate(5);
        return $list;
    }

    public function getPro_ByCate($id){
        $list = Product::where('category_id',$id)->orderBy('sale_price','DESC')->paginate(8);
        return $list;
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Brand(){
        return $this->belongsTo(Brand::class);
    }

    public function Promotion(){
        return $this->belongsTo(Promotion::class);
    }


    public function creates($request){
        $creates = $this->Create([
            'name' => $request -> name,
            'slug' => $request -> slug,
            'origin' => $request -> origin,
            'weight' => $request -> weight,
            'price' => $request -> price,
            'sale_price' => $request -> sale_price,
            'image' => $request -> file,
            'brand_id' => $request -> brand_id,
            'promotion_id' => $request -> promotion_id,
            'category_id' => $request -> category_id,
            'status' => $request -> status,
            'description' => $request -> description
        ]);
        return $creates;
    }

    public function find_id($id){
        return $this->find($id);
    }

    public function Category_id($id){
        $Cate_id = DB::table('products')->where('category_id', $id)->get();
        return $Cate_id;
    }

    public function Brand_id($id){
        $Brand_id = DB::table('products')->where('brand_id', $id)->get();
        return $Brand_id;
    }
    
    public function getColorById($id){
        $color = DB::table('products')
        ->join('attr', 'products.id', '=', 'attr.product_id')
        ->where('attr.product_id',$id)
        ->join('colors', 'attr.color_id', '=', 'colors.id')->get();
        return $color;
    }

    public function imageAttr($id){
        $Image = DB::table('attr')->where('product_id', $id)->get();
        return $Image;
    }
}