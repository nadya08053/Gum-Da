<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(){
        return redirect('/login');

        //return view('index');
    }



    public function changeEmail(){

        if(!empty($_POST['email'])){

            $email = trim(addslashes(strip_tags($_POST['email'])));

            $check = DB::table('users')->select('id')->where('email' , $email)->get();

            if(!empty($check[0]) && is_int($check[0]->id)){

                $new_password = rand(10000,10000000);

                $to = $email;
                $name = 'Gym';
                $title = 'New password';
                $content = $new_password;
                $from_email = 'gym@test.com';
                $subject = $title;
                $txt = 'You password: ' .$content;
                $headers = "From: $from_email" . "\r\n" .
                    "$name";

                mail($to,$subject,$txt,$headers);


                $password = bcrypt($new_password);
                $remember_token = Str::random(60);
                $id = $check[0]->id;

                DB::table('users')
                    ->where('id', $id)
                    ->update(['password' => $password,'remember_token'=>$remember_token]);

               // echo $new_password;
                echo 1;
                exit;
            }

            exit();

        }


    }

}
