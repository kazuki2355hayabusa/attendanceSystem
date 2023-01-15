<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Attendace;
use Illuminate\Http\Request;
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
            $data = ['user' => $users, 'id' => $user_id];
            $request->session()->put('userData', $data);

            $date = date('Y/m/d');
            $attendace = Attendace::where('date', $date)->where('user_id', $user_id)->first();
            $rest = Attendace::where('date', $date)->where('user_id', $user_id)->with('Rest')->latest('updated_at')->first();

            return view('index', ['users' => $users,
                'attendace' => $attendace,
                'rest' => $rest,
                'date' => $date]);

        } else {
            $data = 'ログインに失敗しました。';
            return view('login', ['data' => $data]);
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
