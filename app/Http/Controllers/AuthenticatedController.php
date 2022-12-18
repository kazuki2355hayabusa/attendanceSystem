<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Attendace;
use Illuminate\Support\Facades\Auth;

class AuthenticatedController extends Controller
{
    public function getLogin()
    {

        return view('login', ['data' => '']);

    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $users = Auth::user();
            $user_id = $users->id;
            $data = ['user'=>$users,'id'=>$user_id];
            //dd($user_id);
            $request->session()->put('txt',$data);
           

            $date = date('Y/m/d');
            $result = Attendace::where('date', $date)->where('user_id', $user_id)->first();

            return view('index',['users' => $users,'result' => $result]);

        } else {
            $data = 'ログインに失敗しました。';
            return view('login',['data'=>$data]);
        }
    }
   public function logout(Request $request)
   {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/login');
   } 
}
