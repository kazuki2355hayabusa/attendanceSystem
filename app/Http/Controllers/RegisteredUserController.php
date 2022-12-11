<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(RegisterRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        User::create([
            'name' => $name,
            'email' => $email,
            'password' => HASH::make($password),
        ]);

        return redirect('/login');

    }
}
