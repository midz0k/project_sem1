<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class attr extends Model
{
    protected $table = 'attr';
    protected $fillable = ['product_id','color_id','image','created_at','updated_at'];
    // public $timestamps = false;
    use HasFactory;

    public function get(){
        return $this->all();
    } 

    public function creates($request){
        $creates = $this->Create([
            'product_id' => $request -> product_id,
            'image' => $request -> image,
            'color_id' => $request -> color_id,
        ]);
        return $creates;
    }

    public function Color_id($id){
        $Color_id = DB::table('attr')->where('color_id', $id)->get();
        return $Color_id;
    }

    public function Pro_id($id){
        $Pro_id =  DB::table('attr')->where('product_id', $id)->get();
        return $Pro_id;
    }

    public function deleteProduc($id){
        $delete = attr::where('product_id',$id)->Delete();
        return  $delete;
    }
}
