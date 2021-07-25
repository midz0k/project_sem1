<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(User $User, Request $request){
        if (isset($_GET['sort_by'])) {

            $sort_by = $_GET['sort_by'];
            if ($sort_by == 'kytu_az') {
                $User = User::orderBy('name', 'ASC')->paginate(8);
            }elseif ($sort_by == 'kytu_za') {
                $User = User::orderBy('name', 'DESC')->paginate(8);
            }else{
                $User = $User -> paginate(8);
            }

        }elseif (isset($_GET['Search'])) {
            $Search = $_GET['Search'];
            // dd($_GET['Search']);
            $User = DB::table('users')->where('name', 'LIKE', '%' . $Search . '%')->paginate(8);
        }else{
            $User = $User -> paginate(8);
        }
        return view('Admin.Pages.Users.TableUsers',compact('User'));
    }
}
