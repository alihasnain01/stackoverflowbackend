<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            $user=User::find(auth()->user()->id);
            $user['token']=$user->createToken(auth()->user()->name)->plainTextToken;
            return ['status' => true, 'data' => $user];
        }

        return ['status' => false, 'msg' => 'Invalid login details'];
    }

    public function register(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user->save();

        if($user){
            if (auth()->attempt($request->only('email', 'password'))) {
                $user=User::find(auth()->user()->id);
                $user['token']=$user->createToken(auth()->user()->name)->plainTextToken;
                return ['status' => true, 'data' => $user];
            }
        }

        return ['status' => false, 'msg' => 'Something went wrong! please try again later'];
    }
}
