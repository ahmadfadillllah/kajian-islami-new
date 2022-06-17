<?php

namespace App\Http\Controllers;

use App\Imports\KajianImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use function PHPUnit\Framework\returnSelf;

class ImportKajianController extends Controller
{
    //
    public function index(Request $request)
    {
        $file = $request->file('file');
        $namafile = $file->getClientOriginalName();
        $file->move('DataKajian', $namafile);

        Excel::import(new KajianImport, public_path('/DataKajian/'. $namafile));

        return redirect()->route('kajianislami')->with('info', 'Kajian telah diimport');
    }
}
