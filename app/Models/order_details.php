<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['order_id','product_id','price','quantity','attr','created_at','updated_at'];
    use HasFactory;

    public function add($order,$Cart){
        foreach ($Cart->content() as $value) {
            order_details::create([
                'order_id'=>$order->id,
                'product_id'=>$value['id'],
                'price'=>$value['price'],
                'quantity'=>$value['quantity'],
                'attr'=>$value['attr'],
            ]);
        }
    }

}
