<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';
    protected $fillable = ['name','detail1','detail2','detail3','detail4','created_at','updated_at'];
    // public $timestamps = false;
    use HasFactory;

    public function get(){
        return $this->all();
    } 

    public function getPromotion(){
        $list = Promotion::orderBy('created_at','DESC')->get();
        return $list;
    }

    public function creates($request){
        $creates = $this->Create([
            'name' => $request -> name,
            'detail1' => $request -> detail1,
            'detail2' => $request -> detail2,
            'detail3' => $request -> detail3,
            'detail4' => $request -> detail4
        ]);
        return $creates;
    }

    public function find_id($id){
        return $this->find($id);
    }

    public function Product(){
        return $this->hasMany('App\Models\Admin\Product', 'promotion_id','id');
        // return $this->hasMany(Product::class);
    }
}