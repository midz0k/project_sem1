<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['name','slug','status','created_at','updated_at'];
    // public $timestamps = false;
    use HasFactory;

    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function get(){
        return $this->all();
    }

    public function creates($request){
        $creates = $this->Create([
            'name' => $request -> name,
            'slug' => $request -> slug,
            'status' => $request -> status,
        ]);
        return $creates;
    }

    public function find_id($id){
        return $this->find($id);
    }

    public function Product(){
        return $this->hasMany('App\Models\Admin\Product', 'brand_id','id');
        // return $this->hasMany(Product::class);
    }
}
