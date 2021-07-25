<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name','slug','status','created_at','updated_at'];
    // public $timestamps = false;
    use HasFactory;

    public function get(){
        return $this->all();
    } 

    public function getCategory(){
        $list = Category::where('status',1)->get();
        return $list;
    }

    // public function getCategory_slug($slug){
    //     $list = Category::where('slug',$slug)->get();
    //     return $list;
    // }

    public function creates($request){
        $creates = $this->Create([
            'name' => $request -> name,
            'slug' => $request -> slug,
            'status' => $request -> status
        ]);
        return $creates;
    }

    public function find_id($id){
        return $this->find($id);
    }

    public function Product(){
        return $this->hasMany('App\Models\Admin\Product', 'category_id','id');
        // return $this->hasMany(Product::class);
    }
}
