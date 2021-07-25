<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Color;
use App\Models\Admin\attr;
use App\Http\Requests\Admin\ColorRequest;
use Illuminate\Support\Facades\DB;

class ColorController extends Controller
{
    public function index(Color $color)
    {
        if (isset($_GET['sort_by'])) {

            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'kytu_az') {
                $Color = Color::orderBy('name', 'ASC')->paginate(8);
            }elseif ($sort_by == 'kytu_za') {
                $Color = Color::orderBy('name', 'DESC')->paginate(8);
            }else{
                $Color = $color -> paginate(8);
            }

        }elseif (isset($_GET['Search'])) {
            $Search = $_GET['Search'];
            // dd($_GET['Search']);
            $Color = DB::table('colors')->where('name', 'LIKE', '%' . $Search . '%')->paginate(8);
        }else{
            $Color = $color -> paginate(8);
        }
        return view('Admin.Pages.Color.TableColor',compact('Color'));
    }

    //Thêm mới
    public function create(REQUEST $request,Color $color)
    {
        return view('Admin.Pages.Color.CreateColor');
    }

    public function creates(ColorRequest $request,Color $color)
    {
        $create = $color -> creates($request);
        if ($create) {
            return redirect() -> route('TableColor')->with('success','Thêm mới thành công!');
        }else{
             return redirect() -> route('CreateColor')->with('success','Thêm mới thất bại!');
        }
    }

    // Edit Category
    public function editColor($id,Color $color){
        $Color = $color->find_id($id);
        return view('Admin.Pages.Color.EditColor',compact('Color'));
    }

    public function updateColor(REQUEST $request, $id,Color $color){
        $Color = $color -> find_id($id) -> update($request -> all());

        if ($Color) {
            return redirect() -> route('TableColor')->with('success','Sửa thành công!');
        }else{
            return redirect() -> route('TableColor')->with('success','Sửa thất bại!');
        }
    }

    //delete
    public function deleteColor(REQUEST $request, $id, Color $color,attr $attr){
        $Color = $attr->Color_id($id);
        // dd($Color);
        if (count($Color) > 0) {
            $deletes= attr::where('color_id', $id) -> delete();
            $delete = $color -> find_id($id)->delete();
            if ($delete) {
                return redirect() -> route('TableColor')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableColor')->with('success','Dữ liệu xóa thất bại!');
            }
        }else{
            $delete = $color -> find_id($id) -> delete();

            if ($delete) {
                return redirect() -> route('TableColor')->with('success','Dữ liệu xóa thành công!');
            }else{
                return redirect() -> route('TableColor')->with('success','Dữ liệu xóa thất bại!');
            }
        }
    }
}
