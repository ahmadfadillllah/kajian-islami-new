<?php

namespace App\Http\Controllers;

use App\Models\KajianIslami;
use App\Models\RuteKajian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KajianIslamiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kajian = KajianIslami::with("rute")->get();
        $action = $request->input("action");
        return view('dashboard.kajian-islami.index', compact('kajian', 'action'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.kajian-islami.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $kajian = new KajianIslami;
        $kajian->user_id = Auth::user()->id;
        $kajian->namamasjid = $request->namamasjid;
        $kajian->alamat = $request->alamat;
        $kajian->namapengurusmasjid = $request->namapengurusmasjid;
        $kajian->materidanwaktukajian = $request->materidanwaktukajian;
        $kajian->latlong = $request->latlong;
        $kajian->no_hp = $request->no_hp;
        $kajian->jeniskajian = $request->jeniskajian;
        $kajian->gambar = $request->gambar;
        $kajian->save();

        return redirect()->route('kajianislami')->with('info', 'Kajian Islami berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kajian = KajianIslami::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kajian = KajianIslami::where("id", $id)->first();
        $kajian->user_id = Auth::user()->id;
        $kajian->namamasjid = $request->namamasjid;
        $kajian->alamat = $request->alamat;
        $kajian->namapengurusmasjid = $request->namapengurusmasjid;
        $kajian->materidanwaktukajian = $request->materidanwaktukajian;
        $kajian->save();
        return redirect()->back()->with('info', 'Kajian Islami berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kajian = KajianIslami::find($id);
        $kajian->delete();

        if ($kajian) {
            return redirect()->route('kajianislami')->with('info', 'Kajian Islami telah dihapus');
        }

        return redirect()->route('kajianislami')->with('info', 'Kajian Islami gagal dihapus');
    }

    public function tambah_rute(Request $request)
    {
        $kajian_islami = KajianIslami::where("id", $request->input("kajian_islami_id"))->first();
        $kajian_islamis = KajianIslami::all();
        return view('dashboard.kajian-islami.tambah_rute', compact('kajian_islamis', 'kajian_islami'));
    }

    public function tambah_rute_store(Request $request)
    {
        $rute_kajian = new RuteKajian;
        $rute_kajian->kajian_islami_id = $request->input("kajian_islami_id");
        $rute_kajian->keterangan = $request->input("keterangan");
        $rute_kajian->rute = $request->input("rute");
        $rute_kajian->save();
        return redirect()->back()->with('info', 'Lintasan telah ditambah');
    }
}
