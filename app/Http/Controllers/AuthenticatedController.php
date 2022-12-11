<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function getLogin()
    {
        return view('login',['data'=>'']);
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return view('clock_in');

        } else {
            $data = 'ログインに失敗しました。';
            return view('login',['data'=>$data]);
        }

    }
}
