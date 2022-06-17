<?php

namespace App\Imports;

use App\Models\KajianIslami;
use Maatwebsite\Excel\Concerns\ToModel;

class KajianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new KajianIslami([
            'user_id' => $row[1],
            'namamasjid' => $row[2],
            'alamat' => $row[3],
            'materidanwaktukajian' => $row[4],
            'latlong' => $row[5],
            'namapengurusmasjid' => $row[8],
            'no_hp' => $row[9],
            'jeniskajian' => $row[10],
            'gambar' => $row[11],
        ]);
    }
}
