<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helper\Help;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class DashboardIndexController extends Controller{

    public function index(){
        return view('admin.index');
    }

    public function profile(){
        $statesList = DB::table('states')->get();
        $selectFacility = DB::table('facilities')->get();
        $selectTrainer = DB::table('users')->where('role', 'Trainer')->get();
        $user = User::findOrFail(Auth::user()->id);

        $data = [
            'action' => url('dashboard/update'),
            'user' => $user,
            'statesList'=>$statesList,
            'selectFacility'=>$selectFacility,
            'selectTrainer'=>$selectTrainer
        ];
        return view('admin.profile', $data);
    }

    public function update(Request $request){
        $user = User::findOrFail(Auth::user()->id);
        $userinfo = $request->all();
        if ($request->password!="") {
            $userinfo['password'] = bcrypt($request->password);
        } else {
            $userinfo['password'] = $user->password;
        }

        if($_FILES['file']['error'] == false) {
            $img['file'] = $_FILES['file'];
            $path = 'admin/uploads/users/';
            $userinfo['img'] = Help::resizeAndUpload($img, $path);
        }
        $user->fill($userinfo);
        $user->save();
        return redirect('dashboard');
    }

}
