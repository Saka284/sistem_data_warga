<?php

namespace App\Exports;

use App\Models\Keluarga;
use Maatwebsite\Excel\Concerns\FromCollection;

class KExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Keluarga::all();
    }
}
