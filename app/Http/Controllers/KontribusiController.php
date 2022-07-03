<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontribusiController extends Controller
{
    //
    public function index()
    {
        return view('home.kontribusi');
    }

    public function post(Request $request)
    {
        dd($request->all());
    }
}
