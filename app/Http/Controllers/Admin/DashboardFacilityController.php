<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helper\Help;
use Illuminate\Support\Facades\DB;

class DashboardFacilityController extends Controller
{
    public function index(){

            $list = DB::table('facility')->get();

        return view('admin.facility.index',[
            'list' => $list,
        ]);
    }


    public function edit($id){

        if(!empty($id)) {
            $facility = DB::table('facility')->where('id', $id)->get();
        }

        return view('admin.facility.edit',[
            'facility' => $facility
        ]);
    }


    public function update(){


        if(!empty($_POST)) {

            if($_FILES['file']['error'] == false) {
                $img['file'] = $_FILES['file'];
                $path = 'admin/uploads/users/';
                $_POST['img'] = Help::resizeAndUpload($img, $path);
            }

            $id = $_POST['id'];
            unset($_POST['id']);


            foreach ($_POST as $key => $value) {
                DB::table('facility')
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

            DB::table('facility')
                ->where('id', $id)
                ->update(['deleted' => $val]);

            echo 1;exit;
        }

        if(!empty($_POST['deleted_fac'])) {
            $id = $_POST['id'];
            $facility_id = $_POST['facility_id'];

            DB::table('users_facility')->where([
                ['facility_id', '=', $facility_id],
                ['users_id', '=', $id]
            ])->delete();

            echo 1;exit;
        }

        if(!empty($_POST['deletedImg'])){
            $id = $_POST['id'];

            DB::table('facility')
                ->where('id', $id)
                ->update(['img' => null]);

            echo 1;exit;
        }
    }

    public function add(){

        if(!empty($_POST)){
            unset($_POST['add']);
            if($_FILES['file']['error'] == false) {
                $img['file'] = $_FILES['file'];
                $path = 'admin/uploads/users/';
                $_POST['img'] = Help::resizeAndUpload($img, $path);
            }else{
                $_POST['img'] = null;
            }

            DB::table('facility')->insert(
                [
                    'name'=>trim(addslashes(strip_tags($_POST['name']))),
                    'color'=>$_POST['color'],
                    'img'=>$_POST['img'],
                    'deleted'=> 0,
                    'created_at'=>date('Y-m-d H:i:s'),
                ]
            );



            echo 1;
            exit;

        }

        return view('admin.facility.add');
    }

    public function view($id){

        if(!empty($id)) {
            $users_id = DB::table('users_facility')->select('users_id')->where('facility_id', $id)->get();
        }
        $facility_id = $id;

        return view('admin.facility.view',[
            'users_id' => $users_id,
            'facility_id'=>$facility_id
        ]);
    }


}
