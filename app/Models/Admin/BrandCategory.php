<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BrandCategory extends Model
{
    protected $table = 'brand_category';
    protected $fillable = ['brand_id','category_id','created_at','updated_at'];
    // public $timestamps = false;
    use HasFactory;
    
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    public function Brand(){
        return $this->belongsTo(Brand::class);
    }

    public function get(){
        return $this->paginate(8);
    }

    public function find_id($id){
        return $this->find($id);
    }
    
    public function creates($request){
        $creates = $this->Create([
            'brand_id' => $request -> brand_id,
            'category_id' => $request -> category_id,
        ]);
        return $creates;
    }

    public function Brand_id($id){
        $Brand_id = DB::table('brand_category')->where('brand_id', $id)->get();
        return $Brand_id;
    }

    public function Category_id($id){
        $Cate_id = DB::table('brand_category')->where('category_id', $id)->get();
        return $Cate_id;
    }
}

