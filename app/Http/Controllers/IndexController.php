<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/*use App\Page;
use App\Service;
use App\Portfolio;
use App\People;*/
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){


        return view('index');
    }


}
