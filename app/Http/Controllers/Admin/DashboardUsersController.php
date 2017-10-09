<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Helper\Help;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class DashboardUsersController extends Controller
{
   public function index(){
       $role = Auth::user()->role;

       if($role == 'Trainer') {
           $list = DB::table('users')->where('role', 'customer')->get();
       }else{
           $list = DB::table('users')->get();
       }

       return view('admin.users.index',[
           'list' => $list,
       ]);
   }


    public function edit($id){
        $statesList = DB::table('states')->get();
        if(!empty($id)) {
            $user = DB::table('users')->where('id', $id)->get();
        }

        return view('admin.users.edit',[
            'user' => $user,
            'statesList'=>$statesList
        ]);
    }


    public function update(){

        if(!empty($_POST['edit'])) {

            unset($_POST['edit']);

            if(!empty($_POST['club'])){
                $users_id = $_POST['id'];

                DB::table('users_facility')->insert(
                    [
                        'facility_id'=>$_POST['club'],
                        'users_id'=>$users_id,
                    ]
                );
            }
            unset($_POST['club']);

            if($_FILES['file']['error'] == false) {
                $img['file'] = $_FILES['file'];
                $path = 'admin/uploads/users/';
                $_POST['img'] = Help::resizeAndUpload($img, $path);
            }

            //$_POST['password'] = bcrypt($_POST['password']);
            //$_POST['remember_token'] = Str::random(60);

            $id = $_POST['id'];

            $checkPass = DB::table('users')->select('password')->where('id', $id)->get();


            if($_POST['password'] !== $checkPass[0]->password){
                $_POST['password'] = bcrypt($_POST['password']);
                $_POST['remember_token'] = Str::random(60);
            }


            unset($_POST['id']);
            unset($_POST['confpassword']);

            foreach ($_POST as $key => $value) {
                DB::table('users')
                    ->where('id', $id)
                    ->update([$key => trim(addslashes(strip_tags($value)))]);
            }

            echo 1;
            exit;
        }

    }

    public function delete(){

        if(!empty($_POST['deleted'])) {
            $id = $_POST['id'];
            $val = $_POST['val'];

            DB::table('users')
                ->where('id', $id)
                ->update(['deleted' => $val]);

          echo 1;exit;
        }

        if(!empty($_POST['deletedImg'])){
            $id = $_POST['id'];

            DB::table('users')
                ->where('id', $id)
                ->update(['img' => null]);

            echo 1;exit;
        }
    }

    public function add(){

        $statesList = DB::table('states')->get();

        if(!empty($_POST['facility_role'])){
            $role = DB::table('facility')->select("id", "name")->get()->toJson();
            echo $role;
            exit;
        }

        if(!empty($_POST['add'])){
            unset($_POST['add']);

            if(!empty($_POST['club'])){

                $last_id = DB::table('users')->select('id')->orderBy('id', 'desc')->first();
               $users_id = $last_id->id + 1;

                DB::table('users_facility')->insert(
                    [
                        'facility_id'=>$_POST['club'],
                        'users_id'=>$users_id,
                    ]
                 );
            }
            unset($_POST['club']);

            if($_FILES['file']['error'] == false) {
                $img['file'] = $_FILES['file'];
                $path = 'admin/uploads/users/';
                $_POST['img'] = Help::resizeAndUpload($img, $path);
            }else{
                $_POST['img'] = null;
            }

            unset($_POST['confpassword']);
            $_POST['password'] = bcrypt($_POST['password']);
            $_POST['remember_token'] = Str::random(60);

            DB::table('users')->insert(
                [
                    'name'=>trim(addslashes(strip_tags($_POST['name']))),
                    'password'=>trim(addslashes(strip_tags($_POST['password']))),
                    'fname'=>trim(addslashes(strip_tags($_POST['fname']))),
                    'lname'=>trim(addslashes(strip_tags($_POST['lname']))),
                    'phone'=>trim(addslashes(strip_tags($_POST['phone']))),
                    'email'=>trim(addslashes(strip_tags($_POST['email']))),
                    'street_1'=>trim(addslashes(strip_tags($_POST['street_1']))),
                    'street_2'=>trim(addslashes(strip_tags($_POST['street_2']))),
                    'city'=>trim(addslashes(strip_tags($_POST['city']))),
                    'state'=>trim(addslashes(strip_tags($_POST['state']))),
                    'zip'=>trim(addslashes(strip_tags($_POST['zip']))),
                    'gender'=>trim(addslashes(strip_tags($_POST['gender']))),
                    'img'=>$_POST['img'],
                    'dob'=>$_POST['dob'],
                    'deleted'=>0,
                    'role'=>$_POST['role'],
                    'remember_token'=>$_POST['remember_token'],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=>date('Y-m-d H:i:s'),
                ]
            );



            echo 1;
            exit;

        }

        return view('admin.users.add',['statesList'=>$statesList]);
    }



}
