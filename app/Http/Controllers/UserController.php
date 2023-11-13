<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     return ['status' => false, 'msg' => $validator->errors()];
        // }WW

        if (!auth()->attempt($request->only('email', 'password'))) {
            return ['status' => false, 'msg' => 'Invalid login details'];
        }

        $user = auth()->user();
    }
}
