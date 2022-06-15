<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function simpanuser(Request $request)
    {
        $user = ModelsUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/register');
    }

    public function login()
    {
        return view('login');
    }

    public function ceklogin(Request $request)
    {
        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/');
        } else {
            return "Berhasil Login";
        }
    }
}
