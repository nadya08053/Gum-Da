<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardOverviewController extends Controller{

    public function index(){


        return view('admin.overview.index');

    }


}
