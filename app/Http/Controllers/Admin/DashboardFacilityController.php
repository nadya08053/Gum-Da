<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Helper\Help;
use Illuminate\Support\Facades\DB;
use App\Facility;

class DashboardFacilityController extends Controller
{
    public function index(){

        $list = DB::table('facilities')->get();

        return view('admin.facility.index',[
            'list' => $list,
        ]);
    }

    public function add(){
        $data = [
            'title' => 'Add',
            'action' => url('dashboard/facility/store')
        ];
        return view('admin.facility.add-edit', $data);
    }

    public function store(Request $request)
    {
        $finfo = $request->all();

        if($_FILES['file']['error'] == false) {
            $img['file'] = $_FILES['file'];
            $path = 'admin/uploads/facility/';
            $finfo['img'] = Help::resizeAndUpload($img, $path);
        }

        Facility::create($finfo);
        return redirect('dashboard/facility');
    }

    public function edit($id){

        $facility = Facility::findOrFail($id);

        $data = [
            'title' => 'Edit',
            'action' => url('dashboard/facility/update'),
            'facility' => $facility
        ];

        return view('admin.facility.add-edit', $data);
    }


    public function update(Request $request){

        $facility = Facility::findOrFail($request->id);
        $finfo = $request->all();

        if($_FILES['file']['error'] == false) {
            $img['file'] = $_FILES['file'];
            $path = 'admin/uploads/facility/';
            $finfo['img'] = Help::resizeAndUpload($img, $path);
        }

        $facility->fill($finfo);
        $facility->save();
        return redirect('dashboard/facility');
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

            DB::table('facilities')
                ->where('id', $id)
                ->update(['deleted_at' => $deleted]);

            echo 1;exit;
        }
    }

    public function view($id){

        if(!empty($id)) {
            $users_id = DB::table('users')->select('id')->where('facility_id', $id)->get();
        }
        $facility_id = $id;

        return view('admin.facility.view',[
            'users_id' => $users_id,
            'facility_id'=>$facility_id
        ]);
    }
}
