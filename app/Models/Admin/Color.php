<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';
    protected $fillable = ['name','slug','code_color','created_at','updated_at'];
    // public $timestamps = false;
    use HasFactory;

    public function get(){
        return $this->all();
    }

    public function creates($request){
        $creates = $this->Create([
            'name' => $request -> name,
            'slug' => $request -> slug,
            'code_color' => $request -> code_color
        ]);
        return $creates;
    }

    public function find_id($id){
        return $this->find($id);
    }
}
