<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //

    public function index()
    {
        return view('profile.index');
    }

    public function update(Request $request)
    {
        if (Hash::check($request->password_lama, Auth::user()->password)) {
            $password = User::where('id', Auth::user()->id)->update(['password' => Hash::make($request->password_baru)]);

            if($password){
                return redirect()->route('profile.index')->with('info', 'Password telah diubah!');
            }
        }

        if($request->password_lama != Auth::user()->password){
            return redirect()->route('profile.index')->with('info', 'Password lama salah!');
        }


    }
}
