<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Help;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

class DashboardUsersController extends Controller
{
    public function index(){
        $role = Auth::user()->role;

        if($role == 'Trainer') {
            $list = DB::table('users')->where('role', 'Customer')->get();
        }else{
            $list = DB::table('users')->get();
        }

        return view('admin.users.index',[
            'list' => $list,
        ]);
    }

    public function create(){

        $statesList = DB::table('states')->get();
        $selectFacility = DB::table('facilities')->get();
        $selectTrainer = DB::table('users')->where('role', 'Trainer')->get();

        $data = [
            'title' => 'Add',
            'action' => url('dashboard/user/store'),
            'statesList'=>$statesList,
            'selectFacility'=>$selectFacility,
            'selectTrainer'=>$selectTrainer
        ];
        return view('admin.users.add-edit', $data);
    }

    public function store(Request $request)
    {
        $userinfo = $request->all();

        $userinfo['password'] = bcrypt($request->password);
        $userinfo['remember_token'] = Str::random(60);

        if($_FILES['file']['error'] == false) {
            $img['file'] = $_FILES['file'];
            $path = 'admin/uploads/users/';
            $userinfo['img'] = Help::resizeAndUpload($img, $path);
        }

        User::create($userinfo);
        return redirect('dashboard/userslist');
    }

    public function edit($id)
    {
        $statesList = DB::table('states')->get();
        $selectFacility = DB::table('facilities')->get();
        $selectTrainer = DB::table('users')->where('role', 'Trainer')->get();
        $user = User::findOrFail($id);

        $data = [
            'title' => 'Edit',
            'action' => url('dashboard/user/update'),
            'user' => $user,
            'statesList'=>$statesList,
            'selectFacility'=>$selectFacility,
            'selectTrainer'=>$selectTrainer
        ];

        return view('admin.users.add-edit', $data);
    }

    public function update(Request $request){
        $user = User::findOrFail($request->id);
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
        return redirect('dashboard/userslist');
    }

    public function delete(){

        if(!empty($_POST['deleted'])) {
            $id = $_POST['id'];
            $val = $_POST['val'];
            if ($val == 1) {
                $deleted = date('Y-m-d H:i:s');
            } else {
                $deleted = Null;
            }
            DB::table('users')
                ->where('id', $id)
                ->update(['deleted_at' => $deleted]);

            echo 1;exit;
        }
    }
}
