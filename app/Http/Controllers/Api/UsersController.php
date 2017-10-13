<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helper\Help;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function getbytype(Request $request)
    {
        $type = $request->usertype;

        return User::where(['role'=>$type])->get();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
