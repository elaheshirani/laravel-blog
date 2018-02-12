<?php

namespace App\Http\Controllers\Api\v1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\User as UserResource;

class UserController extends Controller
{
    public function login(Request $request){


        // validation data
        $validData = $this->validate($request,[
            'email'=> 'required|exists:users',
            'password'=> 'required'
        ]);

        // check user login
        if(!auth()->attempt($validData)){

            return response([
                'data'=>'user info is not correct !',
                'status'=>'error'
            ],403);
        }

       /* $user = auth()->user();
        return response([
            'data' => $user,
            'status' => 'success'
        ]);*/

       return new UserResource(auth()->user());

    }
}
