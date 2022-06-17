<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    //

    public function index()
    {
        return view('home.saran');
    }

    public function post(Request $request)
    {
        // dd($request->all());

        Saran::create($request->all());

        return redirect()->route('saran')->with('info', 'Saran / Masukkan kamu telah terkirim');
    }

    public function show()
    {
        $saran = Saran::all()->sortDesc();

        return view('dashboard.saran.index', compact('saran'));
    }
}
