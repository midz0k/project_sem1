<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class orders extends Model
{
    protected $table = 'orders';
    protected $fillable = ['name','user_id','phone','email','address','note','total','status','created_at','updated_at'];
    use HasFactory;

    public function add($request, $Cart){
        $order = orders::create([
            'name'=>$request->name,
            'user_id'=>Auth::user()->id,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'address'=>$request->address,
            'note'=>$request->note,
            'total'=>$Cart->get_Total_price()
        ]);
        return $order;
    }
}
