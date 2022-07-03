<?php

namespace App\Http\Controllers;

use App\Mail\SendPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    //

    public function login()
    {
        //
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $check = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        if ($check) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('login')->with('info', 'Email / Password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login')->with('info', 'Anda telah logout');
    }


    public function register()
    {
        return view("auth.register");
    }

    public function post_register(Request $request)
    {
        $request->validate([
            "name" => "required|min:6",
            "email" => "required|unique:users",
            "password" => "required|min:6|required_with:password_confirmation|same:password_confirmation",
            "password_confirmation" => "required|min:6"
        ]);
        $user = new User;
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->role = 'masyarakatumum';
        $user->password = Hash::make($request->input("password"));
        $user->save();
        return redirect()->route('login')->with('success', 'Berhasil daftar, silahkan login');
    }

    public function forgotpassword()
    {
        return view('auth.forgot-password');
    }
}
