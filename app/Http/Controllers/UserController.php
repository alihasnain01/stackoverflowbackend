<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return ['status' => false, 'msg' => $validator->errors()];
        }


        // dd($validator->errors());
        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return ['status' => true, 'msg' => 'Invalid login details'];
        }

        $user = auth()->user();
    }
}
