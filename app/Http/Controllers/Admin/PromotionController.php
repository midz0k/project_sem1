<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Promotion;
use App\Http\Requests\Admin\PromotionRequest;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    public function index(Promotion $Promotion)
    {
        if (isset($_GET['sort_by'])) {

            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'kytu_az') {
                $Promotion = Promotion::orderBy('name', 'ASC')->paginate(8);
            }elseif ($sort_by == 'kytu_za') {
                $Promotion = Promotion::orderBy('name', 'DESC')->paginate(8);
            }else{
                $Promotion = $Promotion -> paginate(8);
            }

        }elseif (isset($_GET['Search'])) {
            $Search = $_GET['Search'];
            // dd($_GET['Search']);
            $Promotion = DB::table('promotions')->where('name', 'LIKE', '%' . $Search . '%')->paginate(8);
        }else{
            $Promotion = $Promotion -> paginate(8);
        }
        return view('Admin.Pages.Promotion.TablePromotion',compact('Promotion'));
    }

    //Thêm mới
    public function create(REQUEST $request)
    {
        return view('Admin.Pages.Promotion.CreatePromotion');
    }

    public function creates(PromotionRequest $request,Promotion $Promotion)
    {
        $create = $Promotion -> creates($request);
        if ($create) {
            return redirect() -> route('TablePromotion')->with('success','Thêm mới thành công!');
        }else{
             return redirect() -> route('CreatePromotion')->with('success','Thêm mới thất bại!');
        }
    }

    //Edit Category
     public function editPromotion($id,Promotion $Promotion){
        $Promotion = $Promotion->find_id($id);
        return view('Admin.Pages.Promotion.EditPromotion',compact('Promotion'));
    }

    public function updatePromotion(REQUEST $request, $id,Promotion $Promotion){
        // dd ($request->all());
        // dd ($id);
        
        $Promotion = $Promotion -> find_id($id) -> update($request -> all());

        if ($Promotion) {
            return redirect() -> route('TablePromotion')->with('success','Sửa thành công!');
        }else{
            return redirect() -> route('editPromotion')->with('success','Sửa thất bại!');
        }
    }

    //delete
    public function deletePromotion(REQUEST $request, $id, Promotion $Promotion){
        $delete = $Promotion -> find_id($id) -> delete();

        if ($delete) {
            return redirect() -> route('TablePromotion')->with('success','Dữ liệu xóa thành công!');
        }else{
            return redirect() -> route('TablePromotion')->with('success','Dữ liệu xóa thất bại!');
        }
    }
}
