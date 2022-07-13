<?php

namespace App\Imports;

use App\Models\KajianIslami;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Row;

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
            'user_id' => 1,
            'namamasjid' => $row[1],
            'alamat' => $row[2],
            'materidanwaktukajian' => $row[3],
            'latlong' => $row[4],
            'namapengurusmasjid' => $row[5],
            'no_hp' => $row[6],
            'jeniskajian' => $row[7],
            'gambar' => $row[8]
        ]);
    }
}
