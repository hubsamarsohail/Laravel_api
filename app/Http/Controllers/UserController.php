<?php

namespace App\Http\Controllers;

use App\Models\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login (Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if ($user) {

            if (Hash::check($request->password, $user->password)) {

                $token = $user->createToken('Laravel Password Grant Client')->accessToken;

                $response = ['token' => $token];

                return response($response, 200);

            } else {

                $response = ["message" => "Password mismatch"];
                return response($response, 422);

            }
        } else {

            $response = ["message" =>'User does not exist'];
            return response($response, 422);

        }
    }


    public function get(){

        $users=   User::get();
        return response()->json($users, 422);
    }

    
}
